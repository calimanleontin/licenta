@extends('app-game')
@section('title')
    @if(isset($title) and $title  != null)
        {{ $title }}
    @else
        Create a new Set
    @endif
@endsection
@section('title-meta')

@endsection
@section('content')

    <form action="/set/store" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if(isset($set))
            <input type="hidden" name="id" value="{{$set->id}}">
        @endif
        <div class="form-group col-md-6">
            @if(isset($set) and $set->name)
                <input required="required" value="{{$set->name}}" placeholder="Title" type="text" name = "name"class="form-control" />
            @else
                <input required="required" value="" placeholder="Title" type="text" name = "name"class="form-control" />
            @endif
        </div>
        <div class="form-group col-md-6">
            @if(isset($set) and $set->name)
                <input required="required" value="{{$set->bonus}}" placeholder="Bonus" type="number" name = "bonus"class="form-control" />
            @else
                <input required="required" value="" placeholder="Bonus" type="number" name = "bonus"class="form-control" />
            @endif
        </div>
        <div class="form-group">
            @if(isset($set) and $set->name)
                <textarea name='description'class="form-control" placeholder="Description">{{ $set->name }}</textarea>
            @else
                <textarea name='description'class="form-control" placeholder="Description">{{ old('description') }}</textarea>

            @endif
        </div>
        @if(isset($set))
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
