@extends('layouts.app', ['no_nav' => true, 'no_footer' => true])

@section('content')
    <div class="container">
        <h1 class="text-center">{{ $game->name }}</h1>
        <table class="table table-bordered">
            <thead>
            <tr>
                @foreach($game->questions as $section)
                    <th class="text-center"><h4>{{ $section['title'] }}</h4></th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach([200,400,600,800,1000] as $amount)
                <tr>
                    @for($j = 0; $j < 6; $j++)
                        <td>
                            <button type="button" class="btn btn-primary btn-block btn-lg"
                            @click="showQuestion({{ $j }}, {{ $amount }})">${{ $amount }}</button>
                        </td>
                    @endfor
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
