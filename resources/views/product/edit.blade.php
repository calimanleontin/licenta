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
    <div class="col-md-6">
  Categories:
    @foreach($categories as $category)
        <div class="form-group">
            @if(in_array($category->id, $category_ids))
            <label>{!!  Form::radio("category[]",$category->title, true) !!} {{$category->title}} </label>
                @else
            <label>{!!  Form::radio("category[]",$category->title) !!} {{$category->title}} </label>
            @endif
        </div>
    @endforeach
    </div>

    <div class="col-md-6">
        Sets:
        @foreach(\App\Sets::all() as $set)
            <div class="form-group">
                @if(in_array($set->id, $set_ids))
                    <label>{!!  Form::radio("set[]",$set->id, true) !!} {{$set->name}} </label>
                @else
                    <label>{!!  Form::radio("set[]",$set->id, false) !!} {{$set->name}} </label>
                @endif
            </div>
        @endforeach
    </div>

    <div class="form-group">
        {!!  Form::submit('Update',['class'=> 'btn btn-primary'])!!}
    </div>

    {!! Form::close() !!}


@endsection


