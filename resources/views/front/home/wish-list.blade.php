@extends('layouts.front-app.app')
@section('title', 'Wish List')
@section('content')
    <section>
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card p-3">
                    <h5>Hello,</h5>
                    <h2>{{$user->name}}</h2>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    @foreach ($wishLists as $wishList)     
                        <div class="row">
                            <div class="col-md-4">
                                <img src=" {{url($wishList->image1)}}"  class="rounded float-start w-100 h-100 p-4" alt="">
                            </div>
                            <div class="col-md-6 p-4">
                                <h5>Title: {{$wishList->subCategory->name}}</h5>
                                <p>Quantity: {{$wishList->quantity}}</p>
                                <p>Price: {{$wishList->price}}</p>
                                {{-- <p>Price:</p> --}}
                                <a href="" class="btn btn-success">Add to cart</a>
                            </div>
                            <div class="col-md-2 d-flex align-items-center">
                                <form action="{{route('wish-list.destroy', $wishList->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection