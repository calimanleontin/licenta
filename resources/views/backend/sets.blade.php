@extends('backend.layout')

@section('title-meta')

    <div class="col-md-3 left-title">
        <h1 class="text-center">Sets <a href="/set/create" class="glyphicon glyphicon-plus create-button"></a></h1>
    </div>
@endsection

@section('table')

    @if(isset($sets))

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
                    Description
                </th>
                <th>
                    Bonus
                </th>
                <th>

                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($sets as $key => $set)
                <tr>
                    <th scope="row">
                        {{$key + 1}}
                    </th>
                    <td>
                        {{$set->id}}
                    </td>
                    <td>
                        {{ $set->name }}
                    </td>
                    <td>
                        @if(isset($set->description))
                            {{ $set->description }}
                        @else
                            None
                        @endif
                    </td>
                    <td>
                        {{ $set->name }}
                    </td>
                    <td>

                        <a href="/set/edit/{{$set->id}}"><div>edit</div></a>
                        <a href="/set/view/{{$set->slug}}"><div>view</div></a>
                        <a href="/set/delete/{{$set->id}}"><div>delete</div></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endif
@endsection
