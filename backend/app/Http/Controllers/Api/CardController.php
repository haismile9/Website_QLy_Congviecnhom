<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;

class CardController extends Controller
{
    public function index()
    {
        return Card::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'list_column_id' => 'required|exists:list_columns,id',
        ]);

        return Card::create($request->only('title', 'description', 'list_column_id'));
    }

    public function show(Card $card)
    {
        return $card;
    }

    public function update(Request $request, Card $card)
    {
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'list_column_id' => 'sometimes|exists:list_columns,id',
        ]);

        $card->update($request->only('title', 'description', 'list_column_id'));
        return $card;
    }

    public function destroy(Card $card)
    {
        $card->delete();
        return response()->noContent();
    }
}
