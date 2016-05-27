@extends('backend.layout')

@section('title-meta')

    <div class="col-md-3 left-title">
        <h1 class="text-center">Heroes</h1>
    </div>
@endsection

@section('table')

    @if(isset($heroes))

        <table class="table table-bordered table-responsive table-hover table-striped">
            <thead>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Id
                </th>
                <th>
                    Name
                </th>
                <th>
                    Level
                </th>
                <th>
                    Experience
                </th>
                <th>
                    Sex
                </th>
                <th>

                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($heroes as $key => $hero)
                <tr>
                    <th scope="row">
                        {{$key + 1}}
                    </th>
                    <td>
                        {{$hero->id}}
                    </td>
                    <td>
                        {{ $hero->name }}
                    </td>
                    <td>
                       {{ $hero->level }}
                    </td>
                    <td>
                        {{ $hero->experience }}
                    </td>
                    <td>
                        {{ $hero->sex }}
                    </td>
                    <td>

                    </td>
                </tr>
            @endforeach
            <div class="col-xs-12 text-center">
                <div class="pagination">
                    {!! $heroes->render() !!}
                </div>
            </div>
            </tbody>
        </table>

    @endif
@endsection
