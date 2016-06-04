@extends('app-game')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Hero</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/hero/create') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Hero</label>
                                <div class="col-md-6">
                                    @if(!empty($name))
                                        <input type="text" class="form-control" name="name" value="{{$name}}">
                                    @else
                                        <input type="text" class="form-control" name="name" >
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Sex:</label>
                                <div class="col-md-6">
                                        <select required name="sex" class="form-control">
                                            <option value="0">Sex</option>
                                            <option value="masc">Masc</option>
                                            <option value="fem">Fem</option>
                                        </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Class:</label>
                                <div class="col-md-6">
                                    <select required name = 'class' class="form-control">
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}" >{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
