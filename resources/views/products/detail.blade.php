@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h4>Detail Product of {{ $product->name }}</h4>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $product->name }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Quantity:</h4>
                                <p>{{ $product->qty }}</p>
                            </div>
                            <div class="col-md-12">
                                <h4>Buy Price:</h4>
                                <p>{{ $product->buy_price }}</p>
                            </div>
                            <div class="col-md-12">
                                <h4>Sell Price:</h4>
                                <p>{{ $product->sell_price }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
