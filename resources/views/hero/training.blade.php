@extends('app-game')

@section('title')
    Trainer
@endsection

@section('content')

    <div class="col-md-3">
        <div class="place-avatar">
            <img src="/images/users/c471f929251620694b20d34e2e32c28d.jpg" class="place-avatar">
        </div>
    </div>

    <div class="col-md-9">
        <div class="training">
            <div>
                <div>
            <div class="hero-stats">
                <div class="stat">
                    <div class="stat-title">
                        Strength
                    </div>
                    <div class="stat-value">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$hero->stats->final_strength * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $hero->stats->final_strength * 10}}%">
                                {{ $hero->stats->final_strength }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        Perception
                    </div>
                    <div class="stat-value">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow={!! $hero->stats->final_perception * 10  !!}aria-valuemin="0" aria-valuemax="100" style="width:{{ $hero->stats->final_perception* 10}}%">
                                {{ $hero->stats->final_perception }}
                            </div>
                        </div>                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        Endurance
                    </div>
                    <div class="stat-value">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$hero->stats->final_endurance * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $hero->stats->final_endurance * 10}}%">
                                {{ $hero->stats->final_endurance }}
                            </div>
                        </div>                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        Charisma
                    </div>
                    <div class="stat-value">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$hero->stats->final_charisma * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $hero->stats->final_charisma * 10}}%">
                                {{ $hero->stats->final_charisma }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        Intelligence
                    </div>
                    <div class="stat-value">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$hero->stats->final_intelligence * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $hero->stats->final_intelligence * 10}}%">
                                {{ $hero->stats->final_intelligence }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        Agility
                    </div>
                    <div class="stat-value">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$hero->stats->final_agility * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $hero->stats->final_agility * 10}}%">
                                {{ $hero->stats->final_agility }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        Luck
                    </div>
                    <div class="stat-value">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$hero->stats->final_luck * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $hero->stats->final_luck * 10}}%">
                                {{ $hero->stats->final_luck }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

@endsection