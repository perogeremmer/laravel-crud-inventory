@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-3">
                <a href="{{ route('product.create') }}" class="btn btn-md btn-dark">Add Product</a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('product.statistic') }}" class="btn btn-md btn-primary">Statistic Report</a>
            </div>
            <div class="col-md-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Buy Price</th>
                            <th>Sell Price</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->buy_price }}</td>
                                <td>{{ $item->sell_price }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->toFormattedDateString() }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->updated_at)->toFormattedDateString() }}</td>
                                <td>
                                    <a href="{{ route('product.show', $item->id) }}" class="btn btn-sm btn-success">Detail</a>
                                    <a href="{{ route('product.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form class="d-inline" action="{{ route('product.destroy', $item->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" onclick="alert('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Maaf tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
