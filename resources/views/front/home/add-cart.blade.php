{{-- cart js --}}
<script src="{{asset('front/assets/add-cart/app.js')}}"></script>

@extends('layouts.front-app.app')
@section('title', 'Add Cart')
@section('content')
    <section>

        <div class="row">
            <div class="col-md-2">
                <div class="card p-3">
                    <h5>Hello,</h5>
                    <h2>{{$user->name}}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    @foreach ($addCarts as $addCart)     
                        <div class="row">
                            <div class="col-md-4">
                                <img src=" {{url($addCart->image1)}}"  class="rounded float-start w-100 h-100 p-4" alt="">
                            </div>
                            <div class="col-md-4 p-4 mt-5">
                                <h5>Title: {{$addCart->title}}</h5>
                                {{-- <p>Quantity: <span></span> {{$addCart->quantity}}</p> --}}
                                <p>Price: <span id="productPrice">{{$addCart->price}}</span></p>
                            </div>
                            <div class="col-md-2 d-flex align-items-center mt-5">
                               <div class="row justify-content-start">
                                    <button  onclick="productIncreseDecrese(false)" class="btn-secondary w-25" id="cartMinus">-</i></button>
                                    <input type="number" min="0" class="form-control text-center w-50" value="1" id="cartFeild">
                                    <button onclick="productIncreseDecrese(true)" class="btn-secondary w-25" id="cartPluse">+</button>
                               </div>
                            </div>
                            <div class="col-md-2 d-flex align-items-center mt-5">
                                <form action="{{route('cart.destroy', $addCart->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <a href="{{route('home.shipping')}}" class="btn-warning border border-success p-2 text-center text-white mt-5">Go To Shipping Page</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header text-center">Checkout Summary</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Subtotal:</p>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <p><span id="subTotal">500</span>Tk</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Shipping:</p>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <p><span id="shippingCharge">50</span>Tk</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Total:</p>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <p><span id="total">500</span> Tk</p>
                            </div>
                        </div>
                        {{-- <hr> --}}
                        <div class="row" style="border: dotted gray 2px">
                            <div class="col-md-4">
                                <p>Payable:</p>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <p><span id="payable">550</span> Tk</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection