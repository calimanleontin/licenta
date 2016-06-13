@extends('app-game')

@section('title')
    Fight Area
@endsection

@section('content')
    <div class="col-md-12">

        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3>{{ $challenger->name }}</h3>
                </div>
                <div class="panel-body">
                        <div class= hero-avatar">
                            @if($challenger->sex == 'masc')
                                <img src="../images/champions/darius.jpg" class="hero-avatar-fight">
                            @else
                                <img src="../images/champions/riven.jpg" class="hero-avatar-fight">

                            @endif
                        </div>
                        <div class="hero-stats">
                            <div class="stat">
                                <div class="stat-title">
                                    Strength
                                </div>
                                <div class="stat-value">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$challenger->stats->final_strength * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $challenger->stats->final_strength * 10}}%">
                                            {{ $challenger->stats->final_strength }}
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
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow={!! $challenger->stats->final_perception * 10  !!}aria-valuemin="0" aria-valuemax="100" style="width:{{ $challenger->stats->final_perception* 10}}%">
                                            {{ $challenger->stats->final_perception }}
                                        </div>
                                    </div>                    </div>
                            </div>
                            <div class="stat">
                                <div class="stat-title">
                                    Endurance
                                </div>
                                <div class="stat-value">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$challenger->stats->final_endurance * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $challenger->stats->final_endurance * 10}}%">
                                            {{ $challenger->stats->final_endurance }}
                                        </div>
                                    </div>                    </div>
                            </div>
                            <div class="stat">
                                <div class="stat-title">
                                    Charisma
                                </div>
                                <div class="stat-value">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$challenger->stats->final_charisma * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $challenger->stats->final_charisma * 10}}%">
                                            {{ $challenger->stats->final_charisma }}
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
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$challenger->stats->final_intelligence * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $challenger->stats->final_intelligence * 10}}%">
                                            {{ $challenger->stats->final_intelligence }}
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
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$challenger->stats->final_agility * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $challenger->stats->final_agility * 10}}%">
                                            {{ $challenger->stats->final_agility }}
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
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$challenger->stats->final_luck * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $challenger->stats->final_luck * 10}}%">
                                            {{ $challenger->stats->final_luck }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <a href="/fight/{{ $challenger->id }}/{{ $challenged->id }}" class="center little"><btn class="btn btn-danger">FIGHT</btn></a>
        </div>
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3>{{ $challenged->name }}</h3>
                </div>
                <div class="panel-body">

                        <div class= hero-avatar">
                            @if($challenged->sex == 'masc')
                                <img src="../images/champions/darius.jpg" class="hero-avatar-fight">
                            @else
                                <img src="../images/champions/riven.jpg" class="hero-avatar-fight">

                            @endif
                        </div>
                        <div class="hero-stats">
                            <div class="stat">
                                <div class="stat-title">
                                    Strength
                                </div>
                                <div class="stat-value">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$challenged->stats->final_strength * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $challenged->stats->final_strength * 10}}%">
                                            {{ $challenged->stats->final_strength }}
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
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow={!! $challenged->stats->final_perception * 10  !!}aria-valuemin="0" aria-valuemax="100" style="width:{{ $challenged->stats->final_perception* 10}}%">
                                            {{ $challenged->stats->final_perception }}
                                        </div>
                                    </div>                    </div>
                            </div>
                            <div class="stat">
                                <div class="stat-title">
                                    Endurance
                                </div>
                                <div class="stat-value">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$challenged->stats->final_endurance * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $challenged->stats->final_endurance * 10}}%">
                                            {{ $challenged->stats->final_endurance }}
                                        </div>
                                    </div>                    </div>
                            </div>
                            <div class="stat">
                                <div class="stat-title">
                                    Charisma
                                </div>
                                <div class="stat-value">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$challenged->stats->final_charisma * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $challenged->stats->final_charisma * 10}}%">
                                            {{ $challenged->stats->final_charisma }}
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
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$challenged->stats->final_intelligence * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $challenged->stats->final_intelligence * 10}}%">
                                            {{ $challenged->stats->final_intelligence }}
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
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$challenged->stats->final_agility * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $challenged->stats->final_agility * 10}}%">
                                            {{ $challenged->stats->final_agility }}
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
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$challenged->stats->final_luck * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $challenged->stats->final_luck * 10}}%">
                                            {{ $challenged->stats->final_luck }}
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