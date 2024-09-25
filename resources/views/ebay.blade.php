@extends('layouts.app')
@section('content')
<div >
    <h1 class="mt-4 text-center p-3 mb-2 bg-info text-white"> Details from eBay plumbing fixtures</h1> 
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Shipping</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product['title'] }}</td>
                <td>{{ $product['price'] }}</td>
                <td>{{ $product['shipping'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>	
</div>
@endsection
