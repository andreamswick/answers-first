<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

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
}
