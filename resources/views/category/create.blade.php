@extends('app-game')
@section('title')
    @if(isset($title) and $title  != null)
        {{ $title }}
    @else
        Create a new category
    @endif
@endsection
@section('title-meta')

@endsection
@section('content')

    <form action="/category/store" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if(isset($category))
            <input type="hidden" name="id" value="{{$category->id}}">
        @endif
            <div class="form-group">
                @if(isset($category) and $category->title)
                <input required="required" value="{{$category->title}}" placeholder="Title" type="text" name = "title"class="form-control" />
                    @else
                <input required="required" value="" placeholder="Title" type="text" name = "title"class="form-control" />
                @endif
            </div>
            <div class="form-group">
                @if(isset($category) and $category->title)
                <textarea name='description'class="form-control" placeholder="Description">{{ $category->description }}</textarea>
                    @else
                <textarea name='description'class="form-control" placeholder="Description">{{ old('description') }}</textarea>

                    @endif
            </div>
        @if(isset($category))
            <div class="form-group">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
            @else
            <div class="form-group">
                <button class="btn btn-success" type="submit">Create</button>
            </div>
            @endif
    </form>
@endsection
