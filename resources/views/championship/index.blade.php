@extends('app-game')
@section('content')

    <div class="panel panel-danger">

        <div class="panel-heading">
            Active Championships
        </div>
        <div class="panel-danger">
            <div class="prize col-md-12 col-sm-12 col-xs-12">
                @foreach($championships as $championship)


                @endforeach
            </div>

        </div>
    </div>

@endsection