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
                            <label>Product Name *</label>
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
                            <label>Measurment</label>
                            <select  name = "measurment" style="max-height: 42px; width: 220px;" >
                                <option selected value="{{$product->measurement}}">{{$product->measurement}}</option>

                                <option value="PK">PK</option>
                                <option value="BOX">Box</option>
                                <option value="Tin">Tin</option>
                                <option value="Bottle">Bottle</option>
                                <option value="10x10">10x10</option>
                                <option value="2x10">2x10</option>
                                 
                            </select>
                            @error('measurment')
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

                        <span>Update Product</span>
                        </button>
                        </div>
            </div>
        </form>
    </div>
 <!--<script src="script.js"></script>-->
@endsection