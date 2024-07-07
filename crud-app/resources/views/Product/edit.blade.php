@extends('layouts.app')
@section('main')
    <h5><i class="bi bi-plus-square-fill"></i> Update Product</h5>
    <hr>
    <nav class="my-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Update Product</li>
        </ol>
    </nav>
    <div class="col-md-8">
        <form action="/Product/{{ $product->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name"
                        class="form-control @if ($errors->has('name')) {{ 'is-invalid' }} @endif"
                        placeholder="Enter your Product" value="{{ old('name', $product->name) }}">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="MRP" class="form-label">M.R.P</label>
                    <input type="text" class="form-control @if ($errors->has('mrp')) {{ 'is-invalid' }} @endif"
                        name="mrp" id="MRP" placeholder="Enter your MRP" value="{{ old('mrp', $product->mrp) }}">
                    @if ($errors->has('mrp'))
                        <div class="invalid-feedback">
                            {{ $errors->first('mrp') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="Selling_price" class="form-label">Selling Price</label>
                    <input type="text" class="form-control @if ($errors->has('Price')) {{ 'is-invalid' }} @endif"
                        id="Selling_price" name="Price" placeholder="Enter your Selling Price"
                        value="{{ old('Price', $product->Price) }}">
                    @if ($errors->has('Price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('Price') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description"
                        class="form-control @if ($errors->has('description')) {{ 'is-invalid' }} @endif" rows="6"
                        style="resize: none;" name="description" placeholder="Enter Your Description">{{ old('description', $product->description) }}
                    </textarea>
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" id="image" name="image"
                        class="form-control @if ($errors->has('image')) {{ 'is-invalid' }} @endif">
                    @if ($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-dark">Update Product</button>
                <button type="reset" class="btn btn-danger">Clear all</button>
            </div>
        </form>
    </div>
@endsection

