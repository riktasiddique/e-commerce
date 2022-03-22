@extends('layouts.front-app.app')
@section('title', 'My Deal View')
@section('content')
<section>
    <div class="row">
        <div class="col-md-2">
            <div class="card p-3">
                <h5>Hello,</h5>
                {{-- <h2>{{$user->name}}</h2> --}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                @foreach ($myOrders as $myOrder)   
                    <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{url($myOrder->image1)}}"  class="rounded float-start w-100 h-100 p-4" alt="">
                                    </div>
                                    <div class="col-md-4 p-4 mt-5">
                                        <h5>{{$myOrder->subCategory->name}}</h5>
                                        <p>Price: {{$myOrder->price * $myOrder->quantity}}<span></span></p>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center mt-5">
                                    </div>
                                </div>
                    </div>
                    <hr>  
                @endforeach  
            </div>    
        </div>
    </div>
</section>
@endsection