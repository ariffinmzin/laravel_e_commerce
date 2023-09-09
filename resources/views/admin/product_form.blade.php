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

    	<?php 
    	if($product->id){
    		$route = route('product.update', $product->id);
    		$method = 'PUT';
    	} else {
    		$route = route('product.store');
    		$method = 'POST';
    	} ?>

    	<form method="POST" action="{{ $route }}" enctype="multipart/form-data">
    	<input type="hidden" name="_method" value="{{ $method }}">
		@csrf

			<table class="table">
				<tr>
					<td>Product Name</td>
					<td>
						<input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control">
						@error('name')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</td>
				</tr>
				<tr>
					<td>Description</td>
					<td>
						<input type="text" name="description" value="{{ old('description', $product->description) }}" class="form-control">
						@error('description')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</td>
				</tr>
				<tr>
					<td>SKU</td>
					<td>
						<input type="text" name="sku" value="{{ old('sku', $product->sku) }}" class="form-control">
						@error('sku')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</td>
				</tr>
				<tr>
					<td>Photo</td>
					<td>
						<input type="file" name="photo" class="form-control">
						@error('photo')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</td>
				</tr>
				<tr>
					<td>Price</td>
					<td>
						<input type="text" name="price" value="{{ old('price', $product->price) }}" class="form-control">
						@error('price')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button type="submit" class="btn btn-primary">
							Submit
						</button>
					</td>
				</tr>
			</table>

		</form>

	</div>
</div>
@endsection