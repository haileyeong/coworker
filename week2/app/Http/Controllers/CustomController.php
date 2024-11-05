<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomController extends Controller
{
    // index
    public function index()
    {
        return view('boards.index');
    }

    // board1 게시판 목록
    public function board()
    {
        $boards = Board::all();
        return view('custom.board', compact('boards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('custom.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string|max:2000',
        ]);

        // 새로운 게시글 인스턴스 생성
        $board = new Board();

        // 대량 할당을 사용하여 게시글 데이터 저장
        $board->fill([
            'user_id' => Auth::id(),
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);

        $board->save();

        return redirect()->route('custom.board');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $board = Board::findOrFail($id); // id에 맞는 게시글 가져오기
        $board->increment('hit');
        return view('custom.show', compact('board')); // view로 전달
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $board = Board::findOrFail($id);
        return view('custom.edit', compact('board'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string|max:2000',
        ]);

        $board = Board::findOrFail($id);

        $userId = auth()->id();

        if ($board -> user_id === $userId) {
            $board -> update([
                'title' => $request->input('title'),
                'content' => $request->input('content')
            ]);

            return redirect() -> route('custom.board');
        } else {
            return redirect()->route('custom.board')->with('error', '권한이 없습니다.');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $board = Board::findOrFail($id);

        $userId = auth()->id();

        if ($board->user_id === $userId) {
            $board->delete();

            return redirect()->route('custom.board');
        } else {
            return redirect()->route('custom.board')->with('error', '권한이 없습니다.');
        }

    }
}
