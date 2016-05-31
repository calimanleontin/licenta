@extends('app-shop')
@section('title')
    Active Championships
@endsection

@section('content')

    <div class="prize col-md-12 col-sm-12 col-xs-12">
        @foreach($championships as $championship)

            

        @endforeach
    </div>

@endsection