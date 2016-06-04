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
                        {{ $hero->stats->final_strength }}
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        Perception
                    </div>
                    <div class="stat-value">
                        {{ $hero->stats->final_perception }}
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        Endurance
                    </div>
                    <div class="stat-value">
                        {{ $hero->stats->final_endurance }}
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        Charisma
                    </div>
                    <div class="stat-value">
                    {{ $hero->stats->final_charisma }}
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">
                        Intelligence
                    </div>
                    <div class="stat-value">
                        {{ $hero->stats->final_intelligence }}
                    </div>
                    </div>
                <div class="stat">
                    <div class="stat-title">
                        Luck
                    </div>
                    <div class="stat-value">
                        {{ $hero->stats->final_luck }}
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
                <form class="form" action="/set-products" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @foreach($categories as $category)
                    <div class="category-maine-page text-center">
                        {{ $category->title }}
                    </div>
                    <div class="choose">
                            <select name="{{$category->title}}" class="form-control ">
                                <div class="form-group">
                                    <option value="0" class="form-control">Nimic</option>
                                </div>
                                @foreach($category->products as $product)
                                    @if(in_array($product->id, $products))
                                    <div class="form-group">
                                        <option value="{{ $product->id }}" class="form-control">{{ $product->name }}</option>
                                    </div>
                                    @endif
                                @endforeach
                            </select>

                    </div>
                @endforeach
                    <button type="submit" class="btn btn-default update-hero">Assign</button>

                </form>

            </div>
        </div>
@endsection
