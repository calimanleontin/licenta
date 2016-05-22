@extends('app')
@section('title')
    Add a new product
@endsection

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@section('content')

    {{--<form method="post" action="/product/store" >--}}
        {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
        {{--<div class="form-group">--}}
             {{--Name:--}}
        {{--<input  required="required" type="text" name="name" placeholder="Name" class="form-control">--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--Price:--}}
        {{--<input required="required" type="number" name="price" placeholder="Price" class="form-control">--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--Quantity:--}}
            {{--<input required="required" type="number" name="quantity" placeholder="Quantity" class="form-control">--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<input type="file" name = 'image' value="Upload">--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--Description:--}}
            {{--<textarea name="description" class="form-control" placeholder="Description"></textarea>--}}
        {{--</div>--}}

        {{--Check the categories this product to belong to:<br/>--}}
        {{--@foreach($categories as $category)--}}
            {{--<input type="checkbox"  name="category[]" value={{$category->title}}>{{$category->title}}<br>--}}
        {{--@endforeach--}}
        {{--<div class="form-group">--}}
            {{--<input type="submit" name="publish" value="Create"/>--}}
        {{--</div>--}}
    {{--</form>--}}


    {!! Form::open(array('url' => '/product/store', 'method'=>'POST', 'files'=>true)) !!}
    {!! Form::token() !!}

        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name','',['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price','Price') !!}
            {!! Form::number('price','',['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('quantity','Quantity') !!}
            {!! Form::number('quantity','',['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Product Image') !!}
            {!! Form::file('image') !!}
        </div>

    <div class="form-group">
            {!! Form::label('description','Description') !!}
            {!! Form::textarea('description','',['class' => 'form-control']) !!}
        </div>

    @foreach($categories as $category)
        <div class="form-group">
            <label>{!!  Form::checkbox("category[]",$category->title, false) !!} {{$category->title}} </label>
        </div>
    @endforeach

        <div class="form-group">
            {!!  Form::submit('Create',['class'=> ''])!!}
        </div>

    {!! Form::close() !!}


@endsection


