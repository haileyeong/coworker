<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
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
        return view('boards.board', compact('boards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
    {
        // 폼 요청 유효성 검사
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // 새로운 게시글 생성
        Board::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'hit' => 0, // 기본값 0으로 설정
            'user_id' => Auth::id(), // 현재 로그인한 사용자의 ID 삽입
        ]);

        // 리디렉션 및 메시지 설정
        return redirect()->route('/custom-board')->with('success', '게시글이 성공적으로 작성되었습니다.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        Board::findOrFail($id); // id에 맞는 게시글 가져오기
        $board = Board::with('user')->findOrFail($id);
        $board->increment('hit');
        return view('boards.show', compact('board')); // view로 전달
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string|max:2000',
        ]);

        $board = Board::findOrFail($id);

        // 업데이트, 저장
        $board->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        $board->save();

        // 업데이트 후 게시판 목록 페이지로 리디렉션
        return redirect()->route('boards.board');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


    }
}
