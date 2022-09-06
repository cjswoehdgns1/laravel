<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends Controller
{
    public function index()
    {
        return view('boards.index', ['boards' => Board::all() -> sortDesc()]);
    }
    
    public function create()
    {
        return view('boards.create');
    }

    public function store(Request $request)
    {
        $validation = $request -> validate([
            'email' => 'required',
            'subject' => 'required',
            'contents' => 'required',
        ]);

        $board = new Board();
        $board -> email = $validation['email'];
        $board -> subject = $validation['subject'];
        $board -> contents = $validation['contents'];
        $board -> save();

        return redirect() -> route('boards.index');
    }

    public function show($id)
    {
        $board = Board::where('id', $id) -> first();
        return view('boards.show', compact('board'));
    }

    public function edit($id)
    {
        $board = Board::where('id', $id) -> first();
        return view('boards.edit', compact('board'));
    }

    public function update(Request $request, $id){
        $validation = $request -> validate([
            'subject' => 'required',
            'contents' => 'required'
        ]);

        $board = Board::where('id', $id) -> first();
        $board -> subject = $validation['subject'];
        $board -> contents = $validation['contents'];
        $board -> save();

        return redirect() -> route('boards.show', $id);
    }

    public function destroy($id){
        $board = Board::where('id', $id) -> first();
        $board -> delete();

        return redirect() -> route('boards.index');
    }

}
