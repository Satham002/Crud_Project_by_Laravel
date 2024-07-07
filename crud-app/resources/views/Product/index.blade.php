@extends('layouts.app')
@section('main')
    <div class="d-flex justify-content-between">
        <h5><i class="bi bi-journal-richtext"></i>
            Product Details
        </h5>
        <a href="/product/create" class="btn btn-primary"><i class="bi bi-plus-circle"></i>
            New Product
        </a>
    </div>
    <div class="col-md-12 table-responsive mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>MRP</th>
                    <th>Selling Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $products)
                @php
                   $index = ($product->currentPage()-1) * $product->perPage() + $loop->iteration;
                @endphp
                    <tr>
                        <td>{{$index}}</td>
                        <td><img src="Product_pictures/{{$products->image }}"
                                style="width: 50px; height: 50px; object-fit: contain;" alt="Product"></td>
                        <td><a href="Product/{{$products->id}}/show">{{$products->name}}</a></td>
                        <td>Rs. {{$products->Price }}</td>
                        <td>Rs. {{$products->mrp }}</td>
                        <td>
                            <a href="Product/{{$products->id}}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i>
                                Edit</a>
                            <a href="Product/{{$products->id}}/delete" onclick="return confirm('Want to delete')" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $product->links()}}
    </div>
@endsection
