@extends('app-game')


@section('title')

@endsection

@section('content')
    <div class="col-md-12">
        <div class="hero">
            <div class= hero-avatar">
                @if($hero->sex == 'masc')
                    <img src="../images/champions/darius.jpg" class="hero-avatar">
                @else
                    <img src="../images/champions/riven.jpg" class="hero-avatar">

                @endif
            </div>
            <div class="hero-stats">

            </div>
        </div>
    </div>
@endsection
