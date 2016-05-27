@extends('backend.layout')

@section('title-meta')

    <div class="col-md-3 left-title">
        <h1 class="text-center">Products</h1>
    </div>
@endsection

@section('table')

    @if(isset($products))

        <table class="table table-bordered table-responsive table-hover table-striped">
            <thead>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Id
                </th>
                <th>
                    Name
                </th>
                <th>
                    Category
                </th>
                <th>

                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $key => $product)
                <tr>
                    <th scope="row">
                        {{$key + 1}}
                    </th>
                    <td>
                        {{$product->id}}
                    </td>
                    <td>
                        {{ $product->name }}
                    </td>
                    <td>
                        <?php
                            $model = \App\ProductsCategories::where('products_id', $product->id)->first();
                            if($model!= null)
                            $category = \App\Categories::find($model->categories_id);
                        ?>
                        @if(isset($category))
                        {{ $category->title }}
                            @else
                        None
                            @endif
                    </td>
                    <td>
                        <a href="/edit/product/{{$product->id}}"><div>edit</div></a>
                        <a href="/product/{{$product->slug}}"><div>view</div></a>
                        <a href="/product/delete/{{$product->id}}"><div>delete</div></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endif
@endsection
