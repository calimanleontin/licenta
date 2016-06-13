@extends('app-game')
@section('content')
    <script src="/js/site.js"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create hero</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/hero/create') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Hero name:</label>
                                <div class="col-md-6">
                                    @if(!empty($name))
                                        <input type="text" class="form-control" name="name" value="{{$name}}">
                                    @else
                                        <input type="text" class="form-control" name="name" >
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Sex:</label>
                                <div class="col-md-6">
                                        <select required name="sex" class="form-control">
                                            <option value="0">Sex</option>
                                            <option value="masc">Masc</option>
                                            <option value="fem">Fem</option>
                                        </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Class:</label>
                                <div class="col-md-6">
                                    <select required name = 'class' id="class" class="form-control">
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}" >{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @foreach($classes as $class)
                    <div class="hero center hide1" id = 'hero{{ $class->id }}'>
                        <div class= "hero-avatar">
                            @if(empty($class->image))
                                <img src="../images/champions/darius.jpg" class="hero-avatar">
                            @else
                                <img src="../images/champions/riven.jpg" class="hero-avatar">
                            @endif
                        </div>
                        <?php
                            $stats = \App\HeroesTypes::find($class->id);
                        ?>

                        <div class="hero-stats">
                            <div class="stat">
                                <div class="stat-title">
                                    Strength
                                </div>
                                <div class="stat-value">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$stats->strength * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $stats->strength * 10}}%">
                                            {{ $stats->strength }}
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
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow={!! $stats->perception * 10  !!}aria-valuemin="0" aria-valuemax="100" style="width:{{ $stats->perception* 10}}%">
                                            {{ $stats->perception }}
                                        </div>
                                    </div>                    </div>
                            </div>
                            <div class="stat">
                                <div class="stat-title">
                                    Endurance
                                </div>
                                <div class="stat-value">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$stats->endurance * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $stats->endurance * 10}}%">
                                            {{ $stats->endurance }}
                                        </div>
                                    </div>                    </div>
                            </div>
                            <div class="stat">
                                <div class="stat-title">
                                    Charisma
                                </div>
                                <div class="stat-value">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$stats->charisma * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $stats->charisma * 10}}%">
                                            {{ $stats->charisma }}
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
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$stats->intelligence * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $stats->intelligence * 10}}%">
                                            {{ $stats->intelligence }}
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
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$stats->agility * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $stats->agility * 10}}%">
                                            {{ $stats->agility }}
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
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$stats->luck * 10}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $stats->luck * 10}}%">
                                            {{ $stats->luck }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

        </div>
    </div>
</div>

    <div class="space-up"></div>
    <div class="space-up"></div>
    <div class="space-up"></div>
@endsection
