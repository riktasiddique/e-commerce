{{-- style --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@extends('layouts.front-app.app')
@section('title', 'Shipping')
@section('content')
<div class="row mt-5 justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header mb-5"><strong>Shipping Address</strong><small> (Please Fill Out Your Information)</small></div>
            <div class="card-body">
                <form class="border border-secondary p-5" action="" method="">
                    <input type="text" placeholder="Phone Number">
                    <hr class="w-60">
                    <br>
                    <input type="text" placeholder="Division">
                     <hr class="w-60">
                    <br>
                    <input type="text" placeholder="District">
                     <hr class="w-60">
                    <br>
                    <input type="text" placeholder="Address">
                     <hr class="w-60">
                     <button type="submit" class="btn">Confirm Order</button>
                </form>
            </div>
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
                        <p>500Tk</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p>Shipping:</p>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p>50Tk</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p>Total:</p>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p>550Tk</p>
                    </div>
                </div>
                {{-- <hr> --}}
                <div class="row" style="border: dotted gray 2px">
                    <div class="col-md-4">
                        <p>Payable:</p>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p>550Tk</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection