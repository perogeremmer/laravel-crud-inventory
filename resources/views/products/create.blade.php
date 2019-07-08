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
                <form action="{{ route('product.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name:</label>
                        <input class="form-control" name="name" type="text"/>
                    </div>
                    <div class="form-group">
                        <label>Category:</label>
                        <select name="cat" class="form-control">
                            @forelse($cats as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Qty:</label>
                        <input class="form-control" name="quantity" type="number"/>
                    </div>
                    <div class="form-group">
                        <label>Buy Price:</label>
                        <input class="form-control" name="buy_price" type="number"/>
                    </div>
                    <div class="form-group">
                        <label>Sell Price:</label>
                        <input class="form-control" name="sell_price" type="number"/>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-md btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
