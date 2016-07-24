<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function create()
    {
        return view('game.create');
    }

    public function store(Request $request)
    {
        return $request->user()->games()->create($request->all());
    }

    public function edit(Game $game)
    {
        return view('game.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        return [
            'result' => $game->update($request->all()),
        ];
    }

    public function play(Game $game)
    {
        return view('game.play', compact('game'));
    }
}
