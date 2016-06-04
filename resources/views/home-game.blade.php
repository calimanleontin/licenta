@extends('app-game')


@section('content')

        <div class="col-md-3 col-sm-4 col-xs-6">
            <div class="hero">
            <div class= hero-avatar">
                @if($hero->sex == 'masc')
                    <img src="../images/champions/darius.jpg" class="hero-avatar">
                @else
                    <img src="../images/champions/riven.jpg" class="hero-avatar">

                @endif
            </div>
            <div class="hero-stats">
                <div class="stat">
                    <div class="stat-title">
                        Strength
                    </div>
                    <div class="stat-value">
                        {{ $hero->stats->strength }}
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        Perception
                    </div>
                    <div class="stat-value">
                        {{ $hero->stats->perception }}
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        Endurance
                    </div>
                    <div class="stat-value">
                        {{ $hero->stats->endurance }}
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        Charisma
                    </div>
                    <div class="stat-value">
                    {{ $hero->stats->charisma }}
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        Intelligence
                    </div>
                    <div class="stat-value">
                        {{ $hero->stats->intelligence }}
                    </div>
                    </div>
                <div class="stat">
                    <div class="stat-title">
                        Luck
                    </div>
                    <div class="stat-value">
                        {{ $hero->stats->luck }}
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="col-md-3 col-sm-4 col-xs-2 places left">
            <div class="places-title text-center">
                GO TO
            </div>
        </div>

        <div class="col-md-3 col-sm-4 col-xs-2 places left">
            <div class="places-title text-center">
                Equip
            </div>
            <div class="products">
                @foreach($categories as $category)
                    {{ $category->name }}
                @endforeach
            </div>
        </div>
@endsection
