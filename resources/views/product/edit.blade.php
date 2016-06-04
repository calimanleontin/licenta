@extends('app-shop')
@section('title')
    Edit
@endsection

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@section('content')


    {!! Form::open(array('url' => '/update/product/'.$product->id , 'method'=>'POST', 'files'=>true)) !!}
    {!! Form::token() !!}

    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',$product->name,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('quantity','Quantity') !!}
        {!! Form::number('quantity',$product->quantity,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Product Image') !!}
        {!! Form::file('image') !!}
    </div>

    <div class="form-group">
        {!! Form::label('description','Description') !!}
        {!! Form::textarea('description',$product->description,['class' => 'form-control']) !!}
    </div>
  Categories:
    @foreach($categories as $category)
        <div class="form-group">
            @if(in_array($category->id, $ids))
            <label>{!!  Form::checkbox("category[]",$category->title, true) !!} {{$category->title}} </label>
                @else
            <label>{!!  Form::checkbox("category[]",$category->title, false) !!} {{$category->title}} </label>
            @endif
        </div>
    @endforeach

    <div class="form-group">
        {!!  Form::submit('Update',['class'=> 'btn btn-primary'])!!}
    </div>

    {!! Form::close() !!}


@endsection


