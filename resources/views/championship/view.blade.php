@extends('app-shop')
@section('title')
    <div class="text-capitalize text-center">
        {{$championship->name}} Championship
    </div>
@endsection

@section('content')

    <div class="prize col-md-12 col-sm-12 col-xs-12">
        <div class="second-place col-md-4 col-sm-12">
            <div class="panel">
                <div class="panel-heading text-center text-capitalize">
                    Second place
                </div>
                <div class="panel-body">
                    <div class="prize-image">
                        <img src="">
                    </div>
                </div>
            </div>
        </div>

        <div class="first-place col-md-4 col-sm-12">
            <div class="panel">
                <div class="panel-heading text-capitalize text-center">
                    First place
                </div>
                <div class="panel-body">
                    <div class="prize-image">

                    </div>
                </div>
            </div>
        </div>

        <div class="third-place col-md-4 col-sm-12 text-center text-capitalize">
            <div class="panel">
                <div class="panel-heading">
                    Third place
                </div>
                <div class="panel-body">
                    <div class="prize-image">

                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12 col-sm-12 col-xs-12">
                @if(!Auth::guest() and Auth::user()->hero->level >= $championship->level_required)
                    <a href="/attend"><btn class="btn btn-success">Attend</btn></a>
                @else
                    <h6>We are sorry, you have not the required level to attend </h6>
            @endif
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            @if(!Auth::guest() and Auth::user()->hero->level >= $championship->level_required)

                @if(count($championship->heroes) > 0)
                <div class="">
                    Heroes:
                </div>
                    <div class="">
                        <ul>>
                        @foreach($championship->heroes as $hero)
                            <li>
                                {{ $hero->name }}
                            </li>
                        @endforeach
                        </ul>
                    </div>
                    @else
                    <div class="title">
                        Be the first one to join the battle!
                    </div>
                @endif
            @endif
        </div>
    </div>

@endsection