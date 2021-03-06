@extends('app-shop')
@section('title')
    Products in cart
@endsection
@section('content')
    @if(!empty($products))
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Increase</th>
                <th>Decrease</th>
                <th>Delete</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
        @for($i=0;$i<count($products);$i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td><a href="/product/view/{{$products[$i]->slug}}"> {{$products[$i]->name}} </a></td>
                <td>{{$quantities[$i]}}</td>
                <td>{{$products[$i]->price}}</td>
                <td><a href="/cart/increase/{{$products[$i]->id}}"><button class= " btn btn-primary btn-success" > + </button></a></td>
                <td><a href="/cart/decrease/{{$products[$i]->id}}"><button class ="btn btn-primary btn-warning"> - </button></a></td>
                <td><a href="/cart/delete/{{$products[$i]->id}}"> <button class="btn btn-primary btn-danger" >Erase</button></a> </td>
                {{--*/ $var = $quantities[$i]*$products[$i]->price  /*--}}
                <td>{{$var}}</td>
            </tr>
        @endfor
            </tbody>
        </table>
       <a  href="/finish-cart" > <button class="btn btn-default">Purchase</button></a>
    @else
    You have nothing in the cart!
    @endif
    <div class="space-up"></div>
    <div class="space-up"></div>
    <div class="space-up"></div>
    <div class="space-up"></div>
    <div class="space-up"></div>

@endsection
