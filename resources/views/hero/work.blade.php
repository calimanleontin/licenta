@extends('app-game')

@section('title')
    Work
@endsection

@section('content')
    <div class="col-md-3">
        <div class="place-avatar">
            <img src="/images/users/BcaErdjdi.png" class="place-avatar">
        </div>
    </div>

    <div class="col-md-9">
        @foreach($places as $place)
            <div class="place">
                <div class=" col-md-12 go-down">
                    <a href="/work-at/type={{ $place->id }}" class="go-down"><button class="btn btn-default create-button">{{ $place->name }}</button></a>
                </div>
                <div class="col-md-12 go-little-down">
                    <div class="col-md-2"></div>
                    <div class="col-md-3 ">
                        Time: {{ $place->time_spent }}
                    </div>
                    <div class="col-md-3">
                        Experience: {{ $place->experience }}
                    </div>
                    <div class="col-md-3">
                        Reward: {{ $place->reward }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection