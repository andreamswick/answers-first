@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-lobster">
                <div class="panel-heading">
                    Games
                    <a href="/game/create" class="btn btn-default btn-xs btn-fill pull-right">Create <i class="fa fa-plus"></i></a>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($games as $game)
                            <tr>
                                <td>{{ $game->name }}</td>
                                <td class="text-right">
                                    <a href="{{ route('game.play', $game) }}" class="btn btn-success btn-sm">PLAY</a>
                                    <a href="{{ route('game.edit', $game) }}" class="btn btn-warning btn-sm">EDIT</a>
                                    <a href="/game/delete" class="btn btn-danger btn-sm">DELETE</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2"><a href="/game/create">Create a Game</a></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
