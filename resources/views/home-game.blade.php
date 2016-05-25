@extends('app-game')


@section('title')

@endsection

@section('content')
    <div class="col-md-12">
        <div class="col-md-3 bordered">
                <img src="/img/champions/{{ $hero->image }}">
        </div>
    </div>

@endsection
