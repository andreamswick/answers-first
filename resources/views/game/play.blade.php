@extends('layouts.app', ['no_nav' => true, 'no_footer' => true])

@section('content')
    <div class="container">
        <play-game game="{{ $game }}"></play-game>
    </div>
@endsection
