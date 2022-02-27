@extends('layouts.front-app.app')
@section('title', 'Products')
@section('content')
{{-- Any Error --}}
@if ($errors->any())
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
    <section class="product" id="product">
        <h1 class="heading">latest <span>products</span></h1>
        <div class="box-container">
            @foreach ($products as $product) 
                    <div class="box">
                        {{-- <span class="discount">-33%</span> --}}
                        <div class="icons">
                            <form action="{{route('home.wish_list', $product->id)}}" method="POST">
                                @csrf
                                <button type="submit"><i class="fa fa-heart"></i></button>
                            </form>
                            <a href="#" class="fas fa-share"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <img src="{{url($product->image1)}}" alt="">
                        <h3>{{$product->subCategory->name}}</h3>
                        {{-- <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div> --}}
                        {{-- <div class="price"> $10.50 <span> $13.20 </span> </div> --}}
                        <div class="price">Price: {{$product->price}} Tk</div>
                        <div class="quantity">
                            <span>quantity : </span>
                            <input type="number" min="1" max="1000" value="{{$product->quantity}}">
                            <span> /kg </span>
                        </div>
                        {{-- <a href="#" class="btn">add to cart</a> --}}
                        <form action="{{route('product.cart', $product->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn mx-auto w-100">Add Cart</button>
                        </form>
                    </div>
            @endforeach
        </div>
        {{-- Pagination --}}
        {{-- <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
            </ul>
        </nav> --}}
    </section>
@endsection