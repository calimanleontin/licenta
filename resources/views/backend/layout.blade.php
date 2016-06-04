@extends('app-game')


@section('title')

    <div class="col-md-3 menu text-center">
         Backend
    </div>
@endsection
@section('title1')
    <div class="text-center">@yield('title1')</div>
@endsection

    <link href="{{ asset('/css/backend.css') }}" rel="stylesheet">
@section('content')
    <div class="col-md-12 backend">
       <div class="">
           <div class="col-md-3 col-sm-6 col-xs-12 menu">
               <a href="/backend/products"><button class="btn btn-default text-center button-large">Products</button></a>
               <a href="/backend/categories"><button class="btn btn-default text-center button-large">Categories</button></a>
               <a href="/backend/classes"><button class="btn btn-default text-center button-large">Classes</button></a>
               <a href="/backend/championships"><button class="btn btn-default text-center button-large">Championships</button></a>
               <a href="/backend/heroes"><button class="btn btn-default text-center button-large">Heroes</button></a>
               <a href="/backend/sets"><button class="btn btn-default text-center button-large">Sets</button></a>

           </div>
       </div>
        <div class="col-md-9 little-down">
            @yield('table')
        </div>
    </div>

@endsection
