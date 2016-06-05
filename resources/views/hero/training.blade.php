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
        <div class="col-md-9">
        <div class="training">
            <div>
                <div>
            <div class="hero-stats">
                <div class="stat">
                    <div class="stat-title">
                        <a href="/increase?type=strength">Increase Strength</a>
                    </div>
                    <div class="stat-value">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$hero->stats->final_strength * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $hero->stats->final_strength * 10}}%">
                                {{ $hero->stats->final_strength }}
                            </div>
                            <p class="move-right">Price:{{$cost1->strength_cost}}</p>
                        </div>
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        <a href="/increase?type=perception">Increase Perception</a>
                    </div>
                    <div class="stat-value">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow={!! $hero->stats->final_perception * 10  !!}aria-valuemin="0" aria-valuemax="100" style="width:{{ $hero->stats->final_perception* 10}}%">
                                {{ $hero->stats->final_perception }}
                            </div>
                            <p class="move-right">Price:{{$cost2->perception_cost}}</p>
                        </div>
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        <a href="/increase?type=endurance">Increase Endurance</a>
                    </div>
                    <div class="stat-value">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$hero->stats->final_endurance * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $hero->stats->final_endurance * 10}}%">
                                {{ $hero->stats->final_endurance }}
                            </div>
                            <p class="move-right">Price:{{$cost3->endurance_cost}}</p>
                        </div>
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        <a href="/increase?type=charisma">Increase Charisma</a>
                    </div>
                    <div class="stat-value">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$hero->stats->final_charisma * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $hero->stats->final_charisma * 10}}%">
                                {{ $hero->stats->final_charisma }}
                            </div>
                            <p class="move-right">Price:{{$cost4->charisma_cost}}</p>
                        </div>
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        <a href="/increase?type=intelligence">Increase Intelligence</a>
                    </div>
                    <div class="stat-value">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$hero->stats->final_intelligence * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $hero->stats->final_intelligence * 10}}%">
                                {{ $hero->stats->final_intelligence }}
                            </div>
                            <p class="move-right">Price:{{$cost5->intelligence_cost}}</p>
                        </div>
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        <a href="/increase?type=agility">Increase Agility</a>
                    </div>
                    <div class="stat-value">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$hero->stats->final_agility * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $hero->stats->final_agility * 10}}%">
                                {{ $hero->stats->final_agility }}
                            </div>
                            <p class="move-right">Price:{{$cost6->agility_cost}}</p>
                        </div>
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        <a href="/increase?type=luck">Increase Luck</a>
                    </div>
                    <div class="stat-value">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$hero->stats->final_luck * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $hero->stats->final_luck * 10}}%">
                                {{ $hero->stats->final_luck }}
                            </div>
                            <p class="move-right">Price:{{$cost7->luck_cost}}</p>
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