@extends('backend.layout')

@section('title-meta')

    <div class="col-md-5 go-left left-title">
        <h1 class="text-center">Championships <a href="/championship/create" class="glyphicon glyphicon-plus create-button"></a></h1>
    </div>
@endsection

@section('table')

    @if(isset($championships))

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
                    Level Required
                </th>
                <th>
                    Reward
                </th>
                <th>
                    Ticket
                </th>
                <th>
                    Start date
                </th>
                <th>
                    Active
                </th>
                <th>

                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($championships as $key => $championship)
                <tr>
                    <th scope="row">
                        {{$key + 1}}
                    </th>
                    <td>
                        {{$championship->id}}
                    </td>
                    <td>
                        {{ $championship->name }}
                    </td>
                    <td>
                        {{ $championship->level_required }}
                    </td>
                    <td>
                        {{ $championship->reward }}
                    </td>
                    <td>
                        {{ $championship->tiket }}
                    </td>
                    <td>
                        {{ $championship->start_date }}
                    </td>
                    <td>
                        {{ $championship->active }}
                    </td>
                    <td>
                        <a href="/championship/view/{{$championship->id}}"><div>view</div></a>
                        <a href="/championship/destroy/{{$championship->id}}"><div>delete</div></a>
                    </td>
                </tr>
            @endforeach
            <div class="col-xs-12 text-center">
                <div class="pagination">
                    {!! $championships->render() !!}
                </div>
            </div>
            </tbody>
        </table>

    @endif
@endsection
