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

        <div class="form-group col-md-6 ">
            {!! Form::label('price','Price') !!}
            {!! Form::number('price','',['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-6">
            {!! Form::label('quantity','Quantity') !!}
            {!! Form::number('quantity','',['class' => 'form-control']) !!}
        </div>

    <div class="form-group col-md-6">
        {!! Form::label('strength','Strength') !!}
        {!! Form::number('strength','0',['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('perception','Perception') !!}
        {!! Form::number('perception','0',['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('endurance','Endurance') !!}
        {!! Form::number('endurance','0',['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('charisma','Charisma') !!}
        {!! Form::number('charisma','0',['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('intelligence','Intelligence') !!}
        {!! Form::number('intelligence','0',['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('luck','Luck') !!}
        {!! Form::number('luck','0',['class' => 'form-control']) !!}
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
            {!!  Form::submit('Create',['class'=> 'btn btn-default'])!!}
        </div>

    {!! Form::close() !!}


@endsection


