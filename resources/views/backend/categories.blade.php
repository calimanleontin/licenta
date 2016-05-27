@extends('backend.layout')

@section('title-meta')

    <div class="col-md-3 left-title">
        <h1 class="text-center">Categories</h1>
    </div>
@endsection

@section('table')

    @if(isset($categories))

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

                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $key => $category)
                <tr>
                    <th scope="row">
                        {{$key + 1}}
                    </th>
                    <td>
                        {{$category->id}}
                    </td>
                    <td>
                        {{ $category->title }}
                    </td>
                    <td>
                        @if(isset($category->description))
                            {{ $category->description }}
                        @else
                            None
                        @endif
                    </td>
                    <td>

                        <a href="/category/edit/{{$category->id}}"><div>edit</div></a>
                        <a href="/category/{{$category->slug}}"><div>view</div></a>
                        <a href="/category/delete/{{$category->id}}"><div>delete</div></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endif
@endsection
