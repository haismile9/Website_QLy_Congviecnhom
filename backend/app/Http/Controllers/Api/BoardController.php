<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // BoardController.php
public function index()
{
    return Board::all();
}

public function store(Request $request)
{
    $request->validate(['title' => 'required|string|max:255']);
    return Board::create($request->only('title'));
}

public function show(Board $board)
{
    return $board;
}

public function update(Request $request, Board $board)
{
    $board->update($request->only('title'));
    return $board;
}

public function destroy(Board $board)
{
    $board->delete();
    return response()->noContent();
}

}
