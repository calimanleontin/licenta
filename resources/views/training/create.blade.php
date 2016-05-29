@extends('app-game')
@section('title')
    Create a new Championship
@endsection

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@section('content')
    @if(empty($championship))
        {!! Form::open(array('url' => '/championship/store', 'method'=>'POST', 'files'=>true)) !!}
    @else
    @endif

    {!! Form::token() !!}

    <div class="form-group">
        {!! Form::label('name','Name') !!}
        @if(!empty($championship))
            {!! Form::text('name',$championship->name,['class' => 'form-control']) !!}
        @else
            {!! Form::text('name','',['class' => 'form-control']) !!}
        @endif
    </div>

    <div class="form-group col-md-4 col-sm-4  col-xs-6">
        {!! Form::label('reward','reward') !!}
        @if(!empty($championship))
            {!! Form::number('reward', $championship->reward ,['class' => 'form-control']) !!}
        @else
            {!! Form::number('reward','',['class' => 'form-control']) !!}
        @endif
    </div>


    <div class="form-group col-md-4 col-sm-4  col-xs-6">
        {!! Form::label('level_required','Level Required') !!}
        @if(!empty($championship))
            {!! Form::number('level_required',$championship->level_required,['class' => 'form-control']) !!}
        @else
            {!! Form::number('level_required','',['class' => 'form-control']) !!}
        @endif
    </div>


    <div class="form-group col-md-4 col-sm-4  col-xs-6">
        {!! Form::label('ticket','Ticket') !!}
        @if(!empty($championship))
            {!! Form::number('ticket',$championship->ticket,['class' => 'form-control']) !!}
        @else
            {!! Form::number('ticket','',['class' => 'form-control']) !!}
        @endif
    </div>


    <div class="form-grou col-md-4 col-sm-4  col-xs-6">
        {!! Form::label('start_date','Start Date') !!}
        @if(!empty($championship))
            {!! Form::date('start_date',$championship->start_date,['class' => 'form-control']) !!}
        @else
            {!! Form::date('start_date','',['class' => 'form-control']) !!}
        @endif
    </div>


    <div class="form-group col-md-4 col-sm-4  col-xs-6">
        {!! Form::label('max_experience','Experience for first place') !!}
        @if(!empty($championship))
            {!! Form::number('max_experience',$championship->max_experience,['class' => 'form-control']) !!}
        @else
            {!! Form::number('max_experience','',['class' => 'form-control']) !!}
        @endif
    </div>

    <div class="form-group col-md-4 col-sm-4  col-xs-6">
        {!! Form::label('max_places','Maximum places') !!}
        @if(!empty($championship))
            {!! Form::number('max_places',$championship->max_places,['class' => 'form-control']) !!}
        @else
            {!! Form::number('max_places','',['class' => 'form-control']) !!}
        @endif
    </div>


    <div class="form-group">
        {!! Form::label('description','Description') !!}
        @if(!empty($championship))
            {!! Form::textarea('description',$championship->description,['class' => 'form-control']) !!}
        @else
            {!! Form::textarea('description','',['class' => 'form-control']) !!}

        @endif
    </div>

    <div class="form-group">
        {!! Form::label('Product Image') !!}
        {!! Form::file('image') !!}
    </div>


    <div class="form-group">
        {!!  Form::submit('Create',['class'=> 'btn btn-success'])!!}
    </div>

    {!! Form::close() !!}

@endsection


