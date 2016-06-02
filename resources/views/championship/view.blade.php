@extends('app-game')
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
                @if(!Auth::guest() and Auth::user()->hero->level >= $championship->level_required and Auth::user()->hero->busy == 0 and $championship->max_places != 0)
                    <a href="/attend/{{ $championship->id }}"><btn class="btn btn-success">Attend</btn></a>
                @elseif(!Auth::guest() and Auth::user()->hero->level <= $championship->level_required)
                    <h6>We are sorry, you have not the required level to attend </h6>
                    @elseif(!Auth::guest() and Auth::user()->hero->busy == 1)
                <h6>You are busy so can't attend right now </h6>
                    @else
                <h6>No more palces </h6>
                @endif
                    <a href="/tree/{{ $championship->id }}"><btn class="btn btn-danger">View Battle</btn></a>

        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            @if(!Auth::guest() and Auth::user()->hero->level >= $championship->level_required)

            @endif
        </div>
    </div>

@endsection