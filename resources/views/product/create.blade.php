@extends('app-game')
@section('title')
    Add a new product
@endsection

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@section('content')

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


