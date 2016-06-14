@extends('app-shop')
@section('title')
    <span xmlns="http://www.w3.org/1999/html">

    @if(!empty($title))
        {{$title}}
        @else
        Welcome to my shop
    @endif
            <form method="get" action='{{ url("/sort") }}' role="form" class="form-inline mini">
                <div class="form-group">
                    <select name = "criterion" class = 'form-control'>
                        <option value="price">Price</option>
                        <option value = 'created_at'>Date</option>
                        <option value = 'likes'>Likes</option>
                        <option value="noComments">Comments</option>
                    </select>
                    <select name="order" class="form-control">
                        <option value="asc">ascending</option>
                        <option value="desc">descending</option>
                    </select>

                </div>
                <button type="submit" class="btn btn-default">Sort</button>
            </form>
    </span>

    @endsection
@section('content')
    @if(!empty($organizer))
        <div class="col-md-12 text-center">
            <h1> We recommend</h1>
        </div>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators list-down">

            @foreach($organizer as $key => $item)
                    <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="<?php if($key == 0): ?> active <?php endif; ?> "> </li>
            @endforeach
            </ol>

            <div class="carousel-inner" role="listbox">

        @foreach($organizer as $key => $item)
            @if($key == 0)
            <div class="item active">
                @else
            <div class="item">
            @endif

            @foreach($item as $product)
            <div class='center-block'>
                <div class="col-md-3 product text-center" xmlns:max-height="http://www.w3.org/1999/xhtml">
                    <div class="panel-title  title">
                        <a href="/product/view/{{$product->slug}}">{{$product->name}} </a>
                        <a href ='/product/view/{{$product->slug}}'>
                            @if(!empty($product->image))
                            <img src="../images/catalog/{{$product->image}}"  style="max-height: 200px; max-width: 120px;"  alt="Product Image" class = 'img-responsive center-block'>
                            @else
                                <img src="../images/catalog/product.jpg"  style="max-height: 200px; max-width: 120px;"  alt="Product Image" class = 'img-responsive center-block'>
                            @endif
                        </a>
                        <div class="down">

                            <p>
                                <strong>
                                    Price:
                                </strong>
                                {{$product->price}}
                            </p>
                            <p class="quantity">
                                <strong>
                                    Quantity:
                                </strong>
                                {{$product->quantity}}
                            </p>
                        </div>
                    </div>
                    @if(!Auth::guest())
                        <div class="cart" >
                            <a href = '/to-cart/{{$product->id}}'class="no_margin_left"><button class="btn btn-default btn-success link up">Buy</button> </a>
                            @if(Auth::user()->is_admin() or Auth::user()->is_moderator())
                                <a href = '/edit/product/{{$product->id}}' class="no_margin_right"><button class="btn btn-default btn-success link up">Edit</button> </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
            </div>

        @endforeach
            </div>

            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    @endif


    <div class="col-md-12">
            <div class="text-center">
                @if(empty($title))
                    <h1>All the products</h1>
                @else
                <h1> {{ $title }}</h1>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            @foreach($products as $product)
                <div class='center-block'>
                    <div class="col-md-3 product text-center" xmlns:max-height="http://www.w3.org/1999/xhtml">
                        <div class="panel-title  title">
                            <a href="/product/view/{{$product->slug}}">{{$product->name}} </a>
                            <a href ='/product/view/{{$product->slug}}'>
                                @if(!empty($product->image))
                                    <img src="../images/catalog/{{$product->image}}"  style="max-height: 200px; max-width: 120px;"  alt="Product Image" class = 'img-responsive center-block'>
                                @else
                                    <img src="../images/catalog/product.jpg"  style="max-height: 200px; max-width: 120px;"  alt="Product Image" class = 'img-responsive center-block'>
                                @endif
                            </a>
                            <div class="down">

                                <p>
                                    <strong>
                                        Price:
                                    </strong>
                                    {{$product->price}}
                                </p>
                                <p class="quantity">
                                    <strong>
                                        Quantity:
                                    </strong>
                                    {{$product->quantity}}
                                </p>
                            </div>
                        </div>
                        @if(!Auth::guest())
                            <div class="cart" >
                                <a href = '/to-cart/{{$product->id}}'class="no_margin_left"><button class="btn btn-default btn-success link up">Buy</button> </a>
                                @if(Auth::user()->is_admin() or Auth::user()->is_moderator())
                                    <a href = '/edit/product/{{$product->id}}' class="no_margin_right"><button class="btn btn-default btn-success link up">Edit</button> </a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        @if(!empty($order))
            <?php echo $products->appends(['order' => $order,'criterion'=>$criterion])->render(); ?>

        @elseif(!empty($term))
            <?php echo $products->appends(['q' => $term])->render(); ?>
        @else
            {!! $products->render() !!}
        @endif
@endsection
