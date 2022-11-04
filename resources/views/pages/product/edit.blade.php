@extends('layouts.app')

@section('title')
    Edit Product
@endsection

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Product</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="form form-horizontal" action="{{ route('product.update', ['id' => $data->id]) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" class="form-control" name="name" placeholder="Name"
                                                value="{{ $data->name }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Price</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" class="form-control" name="price" placeholder="Price"
                                                value="{{ $data->price }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Stock</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" class="form-control" name="stock" placeholder="Stock"
                                                value="{{ $data->stock }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Description</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea class="form-control" name="desc">{{ $data->desc }}</textarea>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
