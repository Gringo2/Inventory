@extends('layout')
@extends('layout2')

@section('title','Customer')
@section('content')
<div class="container">
        <header>Add Customer</header>

        <form method="POST"action="{{route('customers.update',['customer' => $customer->id])}}">
            @csrf
            <div class="form first">
                <div class="details personal">
                    

                    <div class="fields">
                        <div class="input-field">
                            <label>Company Name</label>
                            <input type="text" name="company_name" placeholder="{{$customer->company_name}}" required>
                            @error('company_name')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="{{$customer->email}}" required>
                            @error('email')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        
                        <div class="input-field">
                            <label>Phone</label>
                            <input type="text" name="phone_number"placeholder="{{$customer->phone_number}}" required>
                            @error('phone_number')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                            
                        </div>
                        <div class="input-field">
                            <label>Address</label>
                            <input type="text" name="address" placeholder="{{$customer->address}}" required>
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