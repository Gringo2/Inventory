@extends('layout')
@extends('layout2')

@section('title','Product')
@section('content')
<div class="container">
        <header>Add Product</header>

        <form method="Post"action="{{route('products.store')}}">
            @csrf
            <div class="form first">
                <div class="details personal">
                    

                    <div class="fields">
                        <div class="input-field">
                            <label>Product Name *</label>
                            <input type="text" name="product_name" placeholder="Product Name" required>
                            @error('product_name')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="input-field">
                            <label>Description</label>
                            <input type="text" name="description" placeholder="Description" required>
                            @error('description')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="input-field">
                            <label>Measurment</label>
                            <select  name = "measurment">
                                <option disabled selected>Select Measurement</option>
                                @foreach($measurements as $measurment)
                                
                                <option value="{{$measurment->name}}">{{$measurment->name}}</option>
                            @endforeach
                            </select>
                            @error('measurment')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="input-field">
                            <label>Quantity</label>
                            <input type="text" name="quantity"placeholder="quantity" required>
                            @error('quantity')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                </div>

                
            </div>

            <div>
                    <button class="btn btn-primary" style="margin:auto;" data-load-more>
                        <span class="spiner"></span>

                        <span>Submit Product</span>
                        </button>
                        </div>
        </form>
    </div>
 <!--<script src="script.js"></script>-->
@endsection