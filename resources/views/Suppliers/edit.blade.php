@extends('layout')
@extends('layout2')

@section('title','Supplier')
@section('content')
<div class="container">
        <header>Add Supplier</header>

        <form method="Post"action="{{route('suppliers.update',['supplier' => $supplier->id])}}">
            @csrf
            <div class="form first">
                <div class="details personal">
                    

                    <div class="fields">
                        <div class="input-field">
                            <label>Company Name</label>
                            <input type="text" name="company_name" placeholder="{{$supplier->company_name}}" required>
                            @error('company_name')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="{{$supplier->email}}" required>
                            @error('email')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="input-field">
                            <label>Phone Number</label>
                            <input type="text" name="phone_number" placeholder="{{$supplier->phone_number}}" required>
                            @error('phone_number')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                            
                        </div>

                        <div class="input-field">
                            <label>Address</label>
                            <input type="text" name="address"placeholder="{{$supplier->address}}" required>
                            @error('address')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                            
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