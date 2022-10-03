@extends('layout')
@extends('layout2')

@section('title','Product')
@section('content')
<div class="container">
        <header>Edit Product</header>

        <form method="POST"action="{{route('products.update',['product' => $product->id])}}">
            @csrf
            @method('PUT')
            <div class="form first">
                <div class="details personal">
                    

                    <div class="fields">
                        <div class="input-field">
                            <label>Product Name</label>
                            <input type="text" name="product_name" value="{{$product->product_name}}" required>
                            @error('product_name')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="input-field">
                            <label>Description</label>
                            <input type="text" name="description" value="{{$product->description}}" required>
                            @error('description')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="input-field">
                            <label>Brand</label>
                            <input type="text" name="brand" value="{{$product->brand}}" required>
                            @error('brand')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                            
                        </div>

                        <div class="input-field">
                            <label>Quantity</label>
                            <input type="text" name="quantity" placeholder="quantity" required>
                            @error('quantity')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                            <!-- <input type="number" placeholder="Enter mobil" required> -->
                        </div>
                        <!-- <div class="input-field">
                            <label>Supplier</label>
                            <input type="text" placeholder="supplier name" required>
                            @error('supplier')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div> -->

                        <div class="input-field">
                            <label>Category</label>
                            <select >
                                <option disabled selected>Select Category</option>
                                <option></option>
                                <option></option>
                                <option></option>
                            </select>
                            
                        </div>
                        <button class="nextBtn">
                        <span class="btnText">Submit</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
 <!--<script src="script.js"></script>-->
@endsection