@extends('app-game')


@section('title')

@endsection

@section('content')
    <div class="col-md-12">
        <div class="col-md-3">
            @if($hero->sex == 'masc')
                <img src="../images/champions/riven.jpg" class="hero-avatar">
                @else
                <img src="../images/champions/darius.jpg" class="hero-avatar">

            @endif
        </div>
    </div>

@endsection
