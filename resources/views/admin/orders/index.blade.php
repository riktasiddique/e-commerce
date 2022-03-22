@extends('layouts.admin-app.app')
@section('title', 'All Orders')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">All Orders Table</strong>
                </div>
                <div class="card-body">
                    <table class="table table-success table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Total</th>
                                <th scope="col">details</th>
                                <th scope="col">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">{{$order->id}}</th>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->total_price}}</td>
                                    <td>
                                        <a href="{{route('order.show', $order->id)}}" class="btn btn-secondary">Details</a>
                                    </td>
                                    <td>
                                        @if (!$order->is_pendding)   
                                            <a href="{{route('order.status', $order->id)}}" class="btn btn-danger">Pendding</a>
                                        @else   
                                            <a href="{{route('order.status', $order->id)}}" class="btn btn-success">Approved</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection