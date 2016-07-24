@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <game game="{{ $game }}"></game>
            </div>
        </div>
    </div>
@endsection
