@extends('app-game')

@section('title')
    Classification
@endsection

@section('content')
<script src="/js/site.js"></script>
    @if (Session::has('stats'))
        <div class="">
            <form method="post" action="/recommend" id="recommend_form">
                <input type="hidden" name="_token" value = '{{ csrf_token() }}' >
                <input type="hidden" name="strength" value="{{ Session::get('stats')[0] }}">
                <input type="hidden" name="perception" value="{{ Session::get('stats')[1] }}">
                <input type="hidden" name="endurance" value="{{ Session::get('stats')[2] }}">
                <input type="hidden" name="charisma" value="{{ Session::get('stats')[3] }}">
                <input type="hidden" name="intelligence" value="{{ Session::get('stats')[4] }}">
                <input type="hidden" name="agility" value="{{ Session::get('stats')[5] }}">
                <input type="hidden" name="luck" value="{{ Session::get('stats')[6] }}">
                Click <span id='stats'>here</span> to get recommended products.
            </form>
        </div>
    @endif

    <div class="col-md-12">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Top ten
                </div>
                <div class="panel-body">
                    <table class="table table-responsive">
                        <th>
                            Level
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Victories
                        </th>
                        <th>
                            Challenge
                        </th>
                    @foreach($first_ten as $hero)
                            @if($hero->id == $champ->id)
                                <tr>
                                    <td class="red">
                                        {{ $hero->level }}
                                    </td>
                                    <td class="red">
                                        {{ $hero->name }}
                                    </td>
                                    <td class="red">
                                        {{ $hero->victories }}
                                    </td>
                                    <td>
                                        {{--<a href = '/challenge/{{ $hero->id }}'><button class="btn-default btn">Fight</button></a>--}}
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td >
                                        {{ $hero->level }}
                                    </td>
                                    <td >
                                        {{ $hero->name }}
                                    </td>
                                    <td>
                                        {{ $hero->victories }}
                                    </td>
                                    <td>
                                        <a href = '/challenge/{{ $hero->id }}'><button class="btn-default btn">Fight</button></a>
                                    </td>
                                </tr>
                            @endif
                    @endforeach
                    </table>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Your league
                </div>
                <div class="panel-body">
                    <table class="table table-responsive">
                        <th>
                            Level
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Victories
                        </th>
                        <th>
                            Challenge
                        </th>
                        @foreach($first_ten as $hero)
                            @if($hero->id == $champ->id)
                            <tr>
                                <td class="red">
                                    {{ $hero->level }}
                                </td>
                                <td class="red">
                                    {{ $hero->name }}
                                </td>
                                <td class="red">
                                    {{ $hero->victories }}
                                </td>
                                <td>
                                    {{--<a href = '/challenge/{{ $hero->id }}'><button class="btn-default btn">Fight</button></a>--}}
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td >
                                    {{ $hero->level }}
                                </td>
                                <td >
                                    {{ $hero->name }}
                                </td>
                                <td>
                                    {{ $hero->victories }}
                                </td>
                                <td>
                                    <a href = '/challenge/{{ $hero->id }}'><button class="btn-default btn">Fight</button></a>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </table>

                </div>
            </div>
            </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Last ten
                </div>
                <div class="panel-body">
                    <table class="table table-responsive">
                        <th>
                            Level
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Victories
                        </th>
                        <th>
                            Challenge
                        </th>
                        @foreach($first_ten as $hero)
                            @if($hero->id == $champ->id)
                                <tr>
                                    <td class="red">
                                        {{ $hero->level }}
                                    </td>
                                    <td class="red">
                                        {{ $hero->name }}
                                    </td>
                                    <td class="red">
                                        {{ $hero->victories }}
                                    </td>
                                    <td>
                                        {{--<a href = '/challenge/{{ $hero->id }}'><button class="btn-default btn">Fight</button></a>--}}
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td >
                                        {{ $hero->level }}
                                    </td>
                                    <td >
                                        {{ $hero->name }}
                                    </td>
                                    <td>
                                        {{ $hero->victories }}
                                    </td>
                                    <td>
                                        <a href = '/challenge/{{ $hero->id }}'><button class="btn-default btn">Fight</button></a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>

                </div>
            </div>
            </div>
        </div>
    </div>
@endsection