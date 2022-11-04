@extends('layouts.app')

@section('title')
    Add Order
@endsection

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Sales Order</h4>
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
                            <form class="form form-horizontal" action="{{ route('order.store') }}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Costumer</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select name="costumer" class="form-control">
                                                <option disabled selected> -- Choose Costumer --</option>
                                                @foreach ($costumers as $costumer)
                                                    <option value="{{ $costumer->id }}">{{ $costumer->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Product</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select name="product" id="product" class="form-control">
                                                <option disabled selected> -- Choose Product --</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Qty</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" class="form-control" name="qty" id="qty" placeholder="Qty" min="1">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Total</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" class="form-control" name="total" id="total" placeholder="Total" readonly>
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
<script>
    let product = document.getElementById('product')
    let qtyEl = document.getElementById('qty')
    let totalEl = document.getElementById('total')
    let price = 0;
    let qty = 0;
    
    product.addEventListener('change', () => {
        let productId = product.value
        let total = 0;
        qty = qtyEl.value
        getProductById(productId)
        .then((data) => {
                price = data.price
                total = price * qty
                totalEl.value = total
            })
    })

    qtyEl.addEventListener('keyup', () => {
        qty = qtyEl.value
        let total = 0;
        total = price * qty;
        totalEl.value = total
    })

    async function getProductById (productId) {
        const response = await fetch('/product/show/'+productId)
        return response.json()
    } 
</script>
@endsection
