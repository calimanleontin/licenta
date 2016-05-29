@extends('app-game')
@section('title')
    @if(empty($class))
        Add a new class
    @else
    Update {{$class->name}}
    @endif
@endsection

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@section('content')

    @if(empty($class))
    {!! Form::open(array('url' => '/class/store', 'method'=>'POST', 'files'=>true)) !!}
    @else
        {!! Form::open(array('url' => '/class/update/'.$class->id, 'method'=>'POST', 'files'=>true)) !!}
    @endif
    {!! Form::token() !!}

    <div class="form-group">
        {!! Form::label('name','Name') !!}
        @if(!empty($class))
            {!! Form::text('name',$class->name,['class' => 'form-control']) !!}
        @else
            {!! Form::text('name','',['class' => 'form-control']) !!}
        @endif
    </div>

    <div class="form-group col-md-3 col-sm-4  col-xs-6">
        {!! Form::label('Class Image') !!}
        {!! Form::file('image') !!}
    </div>


    <div class="form-group col-md-3 col-sm-4  col-xs-6">
        {!! Form::label('strength','Strength') !!}
        @if(!empty($class))
            {!! Form::number('strength', $class->strength ,['class' => 'form-control']) !!}
        @else
            {!! Form::number('strength','',['class' => 'form-control']) !!}
        @endif
    </div>


    <div class="form-group col-md-3 col-sm-4  col-xs-6">
        {!! Form::label('perception','Perception') !!}
        @if(!empty($class))
            {!! Form::number('perception',$class->perception,['class' => 'form-control']) !!}
        @else
            {!! Form::number('perception','',['class' => 'form-control']) !!}
        @endif
    </div>


    <div class="form-group col-md-3 col-sm-4  col-xs-6">
        {!! Form::label('endurance','Endurance') !!}
        @if(!empty($class))
            {!! Form::number('endurance',$class->endurance,['class' => 'form-control']) !!}
        @else
            {!! Form::number('endurance','',['class' => 'form-control']) !!}
        @endif
    </div>


    <div class="form-grou col-md-3 col-sm-4  col-xs-6">
        {!! Form::label('charisma','Charisma') !!}
        @if(!empty($class))
            {!! Form::number('charisma',$class->charisma,['class' => 'form-control']) !!}
        @else
            {!! Form::number('charisma','',['class' => 'form-control']) !!}
        @endif
    </div>


    <div class="form-group col-md-3 col-sm-4  col-xs-6">
        {!! Form::label('intelligence','intelligence') !!}
        @if(!empty($class))
            {!! Form::number('intelligence',$class->intelligence,['class' => 'form-control']) !!}
        @else
            {!! Form::number('intelligence','',['class' => 'form-control']) !!}
        @endif
    </div>

    <div class="form-group col-md-3 col-sm-4  col-xs-6">
        {!! Form::label('agility','Agility') !!}
        @if(!empty($class))
            {!! Form::number('agility',$class->agility,['class' => 'form-control']) !!}
        @else
            {!! Form::number('agility','',['class' => 'form-control']) !!}
        @endif
    </div>

    <div class="form-group col-md-3 col-sm-4  col-xs-6">
        {!! Form::label('luck','luck') !!}
        @if(!empty($class))
            {!! Form::number('luck',$class->luck,['class' => 'form-control']) !!}
        @else
            {!! Form::number('luck','',['class' => 'form-control']) !!}
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('description','Description') !!}
    @if(!empty($class))
            {!! Form::textarea('description',$class->description,['class' => 'form-control']) !!}
        @else
            {!! Form::textarea('description','',['class' => 'form-control']) !!}

        @endif
    </div>

    <div class="form-group">
        @if(empty($class))
            {!!  Form::submit('Create',['class'=> 'btn btn-success'])!!}
        @else
            {!!  Form::submit('Update',['class'=> 'btn btn-default'])!!}
        @endif
    </div>

    {!! Form::close() !!}

@endsection


