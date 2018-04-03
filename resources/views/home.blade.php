@extends('layouts.main', ['title' => 'Home page'])
@section('content')
    <!-- Table filters -->
    <div class="col-lg-10 col-md-12">
        <div id="radioboxes" class="row justify-content-around">
            <div class="col-12 checkboxes">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="show_preorders">
                    <label class="form-check-label" for="defaultCheck1">
                        Hide Pre-orders
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="show_backorders">
                    <label class="form-check-label" for="defaultCheck1">
                        Hide Back-orders
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="show_packshots">
                    <label class="form-check-label" for="show_packshots">
                        Show Packshots
                    </label>
                </div>
            </div>
            <!-- Product table -->
            <div class="col-md-12 table-responsive">
                <table class="table table-sm table_container">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" class="packshots"></th>
                        <th scope="col" class="ean">
                            @if ($sortName == 'ean' && $direction == 'asc')
                                <a href="{{ route('home.sort', ['name' => 'ean', 'direction' => 'desc', 'query' => $query ]) }}">
                                    EAN: <i class="fa fa-sort-up"></i>
                                </a>
                            @else
                                <a href="{{ route('home.sort', ['name' => 'ean', 'direction' => 'asc', 'query' => $query ]) }}">
                                    EAN: <i class="fa fa-sort-down"></i>
                                </a>
                            @endif
                        </th>
                        <th scope="col" class="title">
                            @if ($sortName == 'title' && $direction == 'asc')
                                <a href="{{ route('home.sort', ['name' => 'title', 'direction' => 'desc', 'query' => $query]) }}">
                                    Title: <i class="fa fa-sort-up"></i>
                                </a>
                            @else
                                <a href="{{ route('home.sort', ['name' => 'title', 'direction' => 'asc', 'query' => $query]) }}">
                                    Title: <i class="fa fa-sort-down"></i>
                                </a>
                            @endif
                        </th>
                        <th scope="col" class="platform" style="width: 45px;">
                            @if ($sortName == 'plat' && $direction == 'asc')
                                <a href="{{ route('home.sort', ['name' => 'plat', 'direction' => 'desc', 'query' => $query]) }}">
                                    Pl.: <i class="fa fa-sort-up"></i>
                                </a>
                            @else
                                <a href="{{ route('home.sort', ['name' => 'plat', 'direction' => 'asc', 'query' => $query]) }}">
                                    Pl.: <i class="fa fa-sort-down"></i>
                                </a>
                            @endif
                        </th>
                        <th scope="col" class="release">
                            @if ($sortName == 'release' && $direction == 'asc')
                                <a href="{{ route('home.sort', ['name' => 'release', 'direction' => 'desc', 'query' => $query]) }}">
                                    Release: <i class="fa fa-sort-up"></i>
                                </a>
                            @else
                                <a href="{{ route('home.sort', ['name' => 'release', 'direction' => 'asc', 'query' => $query]) }}">
                                    Release: <i class="fa fa-sort-down"></i>
                                </a>
                            @endif
                        </th>
                        <th scope="col" class="preorders">
                            @if ($sortName == 'deadline' && $direction == 'asc')
                                <a href="{{ route('home.sort', ['name' => 'deadline', 'direction' => 'desc', 'query' => $query]) }}">
                                    Order deadline: <i class="fa fa-sort-up"></i>
                                </a>
                            @else
                                <a href="{{ route('home.sort', ['name' => 'deadline', 'direction' => 'asc', 'query' => $query]) }}">
                                    Order deadline: <i class="fa fa-sort-down"></i>
                                </a>
                            @endif
                        </th>
                        <th scope="col" class="publisher">
                            @if ($sortName == 'pub' && $direction == 'asc')
                                <a href="{{ route('home.sort', ['name' => 'pub', 'direction' => 'desc', 'query' => $query]) }}">
                                    Publisher: <i class="fa fa-sort-up"></i>
                                </a>
                            @else
                                <a href="{{ route('home.sort', ['name' => 'pub', 'direction' => 'asc', 'query' => $query]) }}">
                                    Publisher: <i class="fa fa-sort-down"></i>
                                </a>
                            @endif
                        </th>
                        <th scope="col" class="stock" style="width: 60px;">
                            @if ($sortName == 'stock' && $direction == 'asc')
                                <a href="{{ route('home.sort', ['name' => 'stock', 'direction' => 'desc', 'query' => $query]) }}">
                                    Stock:<i class="fa fa-sort-up"></i>
                                </a>
                            @else
                                <a href="{{ route('home.sort', ['name' => 'stock', 'direction' => 'asc', 'query' => $query]) }}">
                                    Stock:<i class="fa fa-sort-down"></i>
                                </a>
                            @endif
                        </th>
                        <th scope="col" class="price">
                            @if ($sortName == 'price' && $direction == 'asc')
                                <a href="{{ route('home.sort', ['name' => 'price', 'direction' => 'desc', 'query' => $query]) }}">
                                    Price:<i class="fa fa-sort-up"></i>
                                </a>
                            @else
                                <a href="{{ route('home.sort', ['name' => 'price', 'direction' => 'asc', 'query' => $query]) }}">
                                    Price:<i class="fa fa-sort-down"></i>
                                </a>
                            @endif
                        </th>
                        <th scope="col" class="amount">Amount</th>
                        <th scope="col" class="actions"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($errors->first()))
                        {{ $errors->first() }}
                    @endif
                    @foreach($products as $product)
                        <tr class="table-tr">
                            <td class="align-middle product-image-mobile-center packshots">
                                <div class="packshot">
                                    <a target="_blank" href="{{ $product->featured_image_url }}"><img src="{{ $product->featured_image_url }}"></a>
                                </div>
                            </td>
                            <td Data-label="EAN:" class="align-middle text-right" >{{$product->ean}}</td>
                            <td Data-label="Title:" class="align-middle text-right"><ins><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></ins></td>
                            <td Data-label="Platform:" class="align-middle text-right">{{ $product->platform->name }}</td>
                            <td Data-label="Release date:" class="align-middle text-right release">{{ $product->release_date }}</td>
                            <td Data-label="Order deadline:" class="align-middle text-right preorders">{{ $product->deadline}}</td>
                            <td Data-label="Publisher:" class="align-middle text-right publisher">{{ !empty($product->publisher) ? $product->publisher->name : '' }}</td>
                            <td Data-label="Stock:" class="align-middle text-right">{{$product->stockamount}}</td>
                            <td Data-label="Price:" class="align-middle text-right">{{ number_format($product->priceamount, 2, '.', '')}}</td>
                            <td Data-label="Amount" class="align-middle text-right">
                                <input class="input" type="number" id="value{{ $product->id }}" name="amount">
                                <span style="display: none; color: green" id="message{{ $product->id }}" ></span>
                            </td>
                            @admin
                            <td Data-label="Actions:" class="align-middle text-right">
                                <div class="dropdown">
                                    <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button class="dropdown-item add-into-cart" data-url="{{ route('order.store', $product->id) }}">To cart</button>
                                        <a class="dropdown-item" href="{{ route('products.edit', ['id' => $product->id])}}">Edit</a>
                                        <form action="{{ route('products.destroy', ['id' => $product->id])}}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                            <button type="submit" class="dropdown-item">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            @else
                                <td class="align-middle text-right product-image-mobile-center">
                                    <button class="btn btn-dark btn-sm add-into-cart" data-url="{{ route('order.store', $product->id) }}">To cart</button>
                                </td>
                                @endadmin
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div id="pagination" class="row justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
    </div>
@endsection