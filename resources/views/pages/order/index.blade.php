@extends('layouts.app')

@section('title')
    Sales Order
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="col-2 mb-2">
                <a href="{{ route('order.create') }}" class="btn btn-primary">
                    Add Order
                </a>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Simple Datatable
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Costumer</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->costumer->name }}</td>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->qty }}</td>
                                    <td>{{ number_format($order->total, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/extensions/simple-datatables.js') }}"></script>
@endsection
