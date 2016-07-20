@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Games</div>

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
                                <td>
                                    PLAY
                                    EDIT
                                    DELETE
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
