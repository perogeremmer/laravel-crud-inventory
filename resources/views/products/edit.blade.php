@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h4>Form Create Product</h4>
            </div>
            <div class="col-md-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('product.update', $product->id) }}" method="post">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name:</label>
                        <input class="form-control" name="name" type="text" value="{{ $product->name }}"/>
                    </div>
                    <div class="form-group">
                        <label>Category:</label>
                        <select name="cat" class="form-control">
                            @forelse($cats as $item)
                                <option value="{{ $item->id }}" @if($product->category_id == $item->id) selected="selected" @endif>{{ $item->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Qty:</label>
                        <input class="form-control" name="quantity" type="number" value="{{ $product->qty }}"/>
                    </div>
                    <div class="form-group">
                        <label>Buy Price:</label>
                        <input class="form-control" name="buy_price" type="number" value="{{ $product->buy_price }}"/>
                    </div>
                    <div class="form-group">
                        <label>Sell Price:</label>
                        <input class="form-control" name="sell_price" type="number" value="{{ $product->sell_price }}"/>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-md btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
