@extends('app-shop')
@section('title')
    {{$product->name}}
@endsection
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

@section('content')
        @if($product->image)
            <img src="/images/catalog/{{$product->image}}" alt="Smiley face" class = 'img-responsive product-image'>
            @else
            <img src="/images/catalog/product.jpg" alt="Smiley face" class = 'img-responsive product-image'>
        @endif
            &nbsp

        <br>
        @if(!Auth::guest())
            @if(empty($rating))
                <a href="/product/like/{{$product->id}}"><span class="glyphicon glyphicon-thumbs-up gray"></span></a>
                <a href="/product/dislike/{{$product->id}}"><span class="glyphicon glyphicon-thumbs-down gray"></span></a>
            @elseif($rating->likes == 1 and $rating->dislikes == 0)
                <a href="/product/like/{{$product->id}}"><span class=" glyphicon glyphicon-thumbs-up green"></span></a>
                <a href="/product/dislike/{{$product->id}}"><span class="glyphicon glyphicon-thumbs-down gray"></span></a>
            @elseif($rating->likes == 0 and $rating->dislikes == 1)
                <a href="/product/like/{{$product->id}}"><span class="glyphicon glyphicon-thumbs-up gray"></span></a>
                <a href="/product/dislike/{{$product->id}}"><span class="glyphicon glyphicon-thumbs-down red"></span></a>
            @else

                <a href="/product/like/{{$product->id}}"><span class="glyphicon glyphicon-thumbs-up gray"></span></a>
                <a href="/product/dislike/{{$product->id}}"><span class="glyphicon glyphicon-thumbs-down gray"></span></a>
            @endif
        @endif
        No votes:
        @if($product->likes< 0)
            0
        @else
            {{$product->likes}}
        @endif

        <br><br><br>
    <p>
        <span><strong>Description:</strong>
        {!! $product->description !!}
        </span>
    </p>
    <p>
        <span>
            <strong>Price:</strong>
            {!! $product->price !!}
        </span>
    </p>
    <p>
        <span>
            <strong>Quantity</strong>
            {!! $product->quantity !!}
        </span>
    </p>
    <p>
        @if(!Auth::guest() and $product->active == 1)
            <a href="/to-cart/{{$product->id}}"><button class="btn btn-primary">Add to cart</button></a>
        @endif
        @if(!Auth::guest() and Auth::user()->is_admin())
            <a href="/edit/product/{{$product->id}}"><button class="btn btn-primary">Edit</button></a>
        @endif
    </p>

    @if(!Auth::guest())
    Add a comment:
    <form method="post" action="/comment/store" class="form-group">
        <input type = 'hidden' name = '_token' value = "{{csrf_token()}}" >
        <input type="hidden" name = "product_id" value="{{$product->id}}">
        <textarea name ='content' class="form-control" placeholder="Comment"></textarea>
        <div class="form-group">
            <br>
        <input type="submit" value="Add Comment" class ='form-control-static btn btn-success' >
        </div>
    </form>
        @else
        You have to be logged in to comment. Log in <a href ='/auth/login'>here</a>.
    @endif


    <div>
        @if(!empty($comments))
            <ul style="list-style: none; padding: 0">
                @foreach($comments as $comment)
                    <li class="panel-body">
                        <div class="list-group">
                            <div class="list-group-item">
                                <p> <strong>{{ $comment->author_name }} </strong> on
                                {{ $comment->created_at->format('M d,Y \a\t h:i a') }} <br/>
                                updated at
                                {{$comment->updated_at->format('M d,Y \a\t h:i a') }}
                                </p>
                            </div>
                            <div class="list-group-item">
                                <p>{!! $comment->content !!} </p>

                            </div>
                            <div class = 'list-group-item'>
                                @if(!Auth::guest() && ($comment->from_user == Auth::user()->id || Auth::user()->is_admin() || Auth::user()->is_moderator() ))
                                    <a href="{{  url('comment/delete/'.$comment->id) }}" class="btn btn-danger">Delete comment</a>
                                @endif
                                    @if(!Auth::guest() && ($comment->from_user == Auth::user()->id || Auth::user()->is_admin() || Auth::user()->is_moderator() ))
                                        <a href="{{  url('comment/edit/'.$comment->id) }}" class="btn btn-warning">Edit comment</a>
                                    @endif
                            </div>
                        </div>
                    </li>
                @endforeach

                    {!! $comments->render() !!}
            </ul>
        @endif
    </div>

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