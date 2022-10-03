@extends('layout')
@extends('layout2')

@section('title','Category')
@section('content')
<div class="container">
        <header>Add Category</header>

        <form method="Post"action="{{route('products.store')}}">
            @csrf
            <div class="form first">
                <div class="details personal">
                    

                    <div class="fields">
                        <div class="input-field">
                            <label>Category Name</label>
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
                            <label>Brand</label>
                            <input type="text" name="brand" placeholder="brand name" required>
                            @error('brand')
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