@extends('app-game')

@section('title')
    Classification
@endsection

@section('content')

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