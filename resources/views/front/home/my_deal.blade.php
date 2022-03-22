@extends('layouts.front-app.app')
@section('title', 'My Deal')
@section('content')
    <section>
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
                                    <th scope="col">Phone</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Show</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$order->phone}}</td>
                                        <td>{{$order->total_price}}</td>
                                        <td>
                                            @if ($order->status == 1)      
                                            <p><a class="btn-success p-2 border border-warning rounded-pill text-white">Complited</a></p>
                                            @else   
                                            <p><a class="btn-warning p-2 border border-warning rounded-pill text-secondary">Pendding</a></p>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('my_deal.show', $order->id)}}" class="btn btn-secondary">Details</a>
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