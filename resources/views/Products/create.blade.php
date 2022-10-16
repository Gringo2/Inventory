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
                            <label>Brand *</label>
                            <input type="text" name="brand" placeholder="brand name" required>
                            @error('brand')
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
                            <!-- @error('measurment')
                            <div class="error">
                                {{$message}}
                            </div> -->
                            @enderror
                            <!-- <input type="number" placeholder="Enter mobil" required> -->
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

                        <div class="input-field">
                            <label>Batch_no</label>
                            <input type="text" name="batch_no" placeholder="batch number" required>
                            @error('batch_no')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                            
                        </div>
                        <div class="input-field">
                            <label>Expire Date</label>
                            <input type="text" name="expiry_date" placeholder="brand name" required>
                            @error('expiry_date')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                            
                        </div>

                        <!-- <div class="input-field">
                            <label>Category</label>
                            <select >
                            <option disabled selected>Select Category</option>
                            @foreach($categories as $category)
                                
                                <option value = "{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                            </select>
                            
                        </div> -->
                        
                    <div class="input-field">
                            <label>Supplier</label>
                            <select name = "supplierid">
                                <option disabled selected>Select Supplier</option>
                                @foreach($suppliers as $supplier)
                                
                                <option value = "{{$supplier->id}}">{{$supplier->company_name}}</option>
                            @endforeach
                            </select>
                            
                        </div>
                    </div>
                    <button class="btn btn-primary" data-load-more>
                        <span class="spiner"></span>

                        <span>Submit Product</span>
                        </button>
                </div>

                
            </div>

           
        </form>
    </div>
 <!--<script src="script.js"></script>-->
@endsection