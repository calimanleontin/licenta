@extends('app-game')
@section('content')

    <div class="panel gray absolute">

        <div class="panel-heading text-center">
            <h1>Active Championships</h1>
        </div>
    </div>
        <div class="">
            <div class="prize col-md-12 col-sm-12 col-xs-12">
                @foreach($championships as $championship)
                    <div class="championship" id="championship">
                        <a href="/championship/view/{{ $championship->id }}">
                            <div class="col-md-12">
                                <div class="text-center text-capitalize col-md-12">
                                    <div class="championship-title">
                                        <h2>{{ $championship->name }}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-12 championship-subtitle">
                                    <div class="col-md-4">
                                        <strong>Required level: </strong> {{ $championship->level_required }}
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Reward: </strong> ${{ $championship->reward }}
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Experience: </strong> {{ $championship->max_experience }} exp
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    <div class="space-up"></div>
    <div class="space-up"></div>
    <div class="space-up"></div>
    <div class="space-up"></div>
    <div class="space-up"></div>
    <div class="space-up"></div>
    <div class="space-up"></div>

@endsection