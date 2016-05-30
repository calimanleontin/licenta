@extends('app-shop')
@section('title')
    @if(!empty($title))
        {{$title}}
    @else
        Order History
    @endif

@endsection
@section('content')
    @if(!empty($orders))
        <table class="table table-bordered table-responsive table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Sum</th>
                <th>Date</th>
                <th>View Details</th>
            </tr>
            </thead>
            <tbody>
        @foreach($orders as $order)
            <tr>
                <?php
                    $ceva = \App\Orders::where('order_id', $order->order_id)->get();
                    $sum = 0;
                    foreach($ceva as $cev)
                        {
                            $sum += $cev->sum;
                        }

                        ?>
                <td scope="row"></td>
                <td>{{$sum}}</td>
                <td>{{$order->created_at}}</td>
                <td><a href="order-details/{{$order->order_id}}"><button class="btn btn-success btn-group btn-block">Details</button></a></td>
            </tr>
        @endforeach
            </tbody>
        </table>
        {!! $orders->render() !!}
    @endif
@endsection
@section('category-title')
    Categories
@endsection
@section('category-content')
    @if(!empty($categories))
        <ul class="list-group">
            @foreach($categories as $category)
                <a href = '/category/view/{{$category->slug}}'><li class="list-group-item">{{$category->title}} </li></a>
            @endforeach
        </ul>
    @endif
@endsection