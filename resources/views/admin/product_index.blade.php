@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        List of all products
    </div>
    <div class="card-body">

        @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif

        <a href="{{route('product.create')}}" class="btn btn-primary">Add Product</a>

        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>SKU</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Photo</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            @php($i = 0)    
            @foreach($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    @if($product->photo)
                    <img src="{{ asset('storage/products/'.$product->photo) }}" alt="" style="width:100px;">
                    @else
                    No Photo 
                    @endif
                </td>
                <td>{{ number_format($product->price,2) }}</td>
                <td>
                    <form method="POST" action="{{ route('product.destroy', $product->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </form>
                </td>
                
                
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection