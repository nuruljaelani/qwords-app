@extends('layouts.app')

@section('title')
    Edit Costumer
@endsection

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Costumer</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="form form-horizontal" action="{{ route('costumer.update', ['id' => $data->id]) }}" method="POST">
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
                                            <label>Gender</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select name="gender" class="form-control">
                                                <option disabled selected> -- Choose Gender --</option>
                                                <option value="Male" {{$data->gender == 'Male' ? 'selected':'' }}>Male</option>
                                                <option value="Female" {{$data->gender == 'Female' ? 'selected':'' }}>Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" class="form-control" name="phone" placeholder="Phone"
                                                value="{{ $data->phone }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Address</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea class="form-control" name="address">{{ $data->address }}</textarea>
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
