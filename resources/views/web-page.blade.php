@extends('layouts.app')
@section('content')
<div >
	<h1 class="mt-4 text-center  p-3 mb-2 bg-info text-white">Laptop Details From  Amazon </h1> 
<table class="table table-bordered mt-5">
	<tr>
		<th>Title</th>
		<th>Price</th>
	</tr>
	 @foreach($products as $product)
	<tr>
		<td>{{ $product['title'] }}</td>
		<td>{{ $product['price'] }}</td>
	</tr>
	@endforeach
	
</table>	
	
</div>
@endsection
