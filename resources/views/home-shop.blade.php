@extends('app-shop')
@section('title')
    <span>
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
    @if(!empty($products))
        @foreach($products as $product)
            <div class='center-block'>
                <div class="col-md-3 product text-center" xmlns:max-height="http://www.w3.org/1999/xhtml">
                    <div class="panel-title  title">
                        <a href="/product/{{$product->slug}}">{{$product->name}} </a>
                        <a href ='/product/{{$product->slug}}'>
                            <img src="../images/catalog/{{$product->image}}"  style="max-height: 200px; max-width: 120px;"  alt="Product Image" class = 'img-responsive center-block'>
                        </a>
                        <div class="down">

                            <p>
                                <strong>
                                    Price:
                                </strong>
                                {{$product->price}}
                            </p>
                            <p>
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
        @if(!empty($order))
            <?php echo $products->appends(['order' => $order,'criterion'=>$criterion])->render(); ?>

        @elseif(!empty($term))
            <?php echo $products->appends(['q' => $term])->render(); ?>
        @else
            {!! $products->render() !!}
        @endif
    @endif
@endsection
