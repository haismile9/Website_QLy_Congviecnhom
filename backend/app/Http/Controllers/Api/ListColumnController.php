<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ListColumn;

class ListColumnController extends Controller
{
    public function index()
    {
        return ListColumn::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'board_id' => 'required|exists:boards,id',
        ]);

        return ListColumn::create($request->only('title', 'board_id'));
    }

    public function show(ListColumn $listColumn)
    {
        return $listColumn;
    }

    public function update(Request $request, ListColumn $listColumn)
    {
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'board_id' => 'sometimes|exists:boards,id',
        ]);

        $listColumn->update($request->only('title', 'board_id'));
        return $listColumn;
    }

    public function destroy(ListColumn $listColumn)
    {
        $listColumn->delete();
        return response()->noContent();
    }
}

