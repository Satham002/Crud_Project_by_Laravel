@extends('layouts.app')
@section('main')
    <div class="container mt-3">
        <div class="row m-2">
            <h5><i class="bi bi-info-circle-fill"></i> Product details</h5>
            <hr>
            <nav class="my-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">About Product</li>
                </ol>
            </nav>
            <div class="card">
                {{-- {{var_dump($product->image)}} --}}
                <img src="/Product_pictures/{{ $product->image }}" alt="{{ $product->name }}" style="width: 500px; height: 500px; object-fit: contain;" class="card-img-top mt-5">
                <div class="card-body">
                    <h5 class="fw-bold">{{ $product->name }}</h5>
                    <p class="card-text text-secondary">{{ $product->description }}</p>
                    <p class="fw-semibold">MRP :<small class="text-danger text-decoration-line-through"> RS. {{ $product->mrp }} </small></p>
                    <p class="fw-semibold">Selling price :<small class="text-success"> Rs. {{ $product->Price }} </small></p>
                </div>

            </div>
        </div>
    </div>
@endsection
