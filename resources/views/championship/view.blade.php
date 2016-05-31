@extends('app-shop')
@section('title')
    {{$championship->name}}
@endsection

@section('content')

    <div class="prize col-md-12 col-sm-12 col-xs-12">
        <div class="second-place col-md-4 col-sm-12">
            <div class="panel">
                <div class="panel-heading text-center text-capitalize">
                    Second place
                </div>
                <div class="panel-body">
                    <div class="prize-image">
                        <img src="">
                    </div>
                </div>
            </div>
        </div>

        <div class="first-place col-md-4 col-sm-12">
            <div class="panel">
                <div class="panel-heading text-capitalize text-center">
                    First place
                </div>
                <div class="panel-body">
                    <div class="prize-image">

                    </div>
                </div>
            </div>
        </div>

        <div class="third-place col-md-4 col-sm-12 text-center text-capitalize">
            <div class="panel">
                <div class="panel-heading">
                    Third place
                </div>
                <div class="panel-body">
                    <div class="prize-image">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection