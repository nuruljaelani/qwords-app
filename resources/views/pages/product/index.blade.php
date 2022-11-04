@extends('layouts.app')

@section('title')
    Product
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="col-2 mb-2">
                <a href="{{ route('product.create') }}" class="btn btn-primary">
                    Add Product
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
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('product.edit', ['id' => $item->id]) }}"
                                            class="btn btn-success btn-sm">
                                            Edit
                                        </a>
                                        <form class="form-delete" id="form-delete"
                                            action="{{ route('product.delete', ['id' => $item->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                onclick="handleSubmit()">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
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
