@extends('backend.layout')

@section('title-meta')

    <div class="col-md-3 left-title">
        <h1 class="text-center">Classes</h1>
    </div>
@endsection

@section('table')

    @if(isset($classes))

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
                    Strength
                </th>
                <th>
                    Perception
                </th>
                <th>
                    Endurance
                </th>
                <th>
                    Charisma
                </th>
                <th>
                    Intelligence
                </th>
                <th>
                    Luck
                </th>
                <th>

                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($classes as $key => $class)
                <tr>
                    <th scope="row">
                        {{$key + 1}}
                    </th>
                    <td>
                        {{$class->id}}
                    </td>
                    <td>
                        {{ $class->name }}
                    </td>
                    <td>
                        {{ $class->strength }}
                    </td>
                    <td>
                        {{ $class->perception }}
                    </td>
                    <td>
                        {{ $class->endurance }}
                    </td>
                    <td>
                        {{ $class->charisma }}
                    </td>
                    <td>
                        {{ $class->intelligence }}
                    </td>
                    <td>
                        {{ $class->luck }}
                    </td>
                    <td>
                        <a href="/class/edit/{{$class->id}}"><div>edit</div></a>
                        <a href="/class/delete/{{$class->id}}"><div>delete</div></a>
                    </td>
                </tr>
            @endforeach
            <div class="col-xs-12 text-center">
                <div class="pagination">
                    {!! $classes->render() !!}
                </div>
            </div>
            </tbody>
        </table>

    @endif
@endsection
