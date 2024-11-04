<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $board = Board::findOrFail($id); // id에 맞는 게시글 가져오기
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
        //
    }
}
