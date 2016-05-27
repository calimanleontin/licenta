@extends('app-game')


@section('title')
    <div class="col-md-5 menu">
        &nbsp&nbsp&nbsp&nbsp Backend
    </div>
@endsection
@section('title1')
    @yield('title1')
@endsection

    <link href="{{ asset('/css/backend.css') }}" rel="stylesheet">
@section('content')
    <div class="col-md-12 backend">
       <div class="">
           <div class="col-md-3 menu">
               <a href="/backend/products"><button class="btn btn-default text-center button-large">Products</button></a>
               <a href="/backend/categories"><button class="btn btn-default text-center button-large">Categories</button></a>
               <a href="/backend/families"><button class="btn btn-default text-center button-large">Families</button></a>
               <a href="/backend/championships"><button class="btn btn-default text-center button-large">Championships</button></a>
               <a href="/backend/trainings"><button class="btn btn-default text-center button-large">Trainings</button></a>
               <a href="/backend/heroes"><button class="btn btn-default text-center button-large">Heroes</button></a>

           </div>
       </div>
        <div class="col-md-9 little-down">
            @yield('table')
        </div>
    </div>

@endsection
