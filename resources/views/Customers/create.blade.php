@extends('layout')
@extends('layout2')

@section('title','Customer')
@section('content')
<div class="container">
        <header>Add Customer</header>

        <form method="Post"action="{{route('customers.store')}}">
            @csrf
            <div class="form first">
                <div class="details personal">
                    

                    <div class="fields">
                        <div class="input-field">
                            <label>Company Name</label>
                            <input type="text" name="company_name" placeholder="Company Name" required>
                            @error('company_name')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="company mail" required>
                            @error('email')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        
                        <div class="input-field">
                            <label>Phone</label>
                            <input type="text" name="phone_number"placeholder="phone number" required>
                            @error('phone_number')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                            
                        </div>
                        <div class="input-field">
                            <label>Address</label>
                            <input type="text" name="address" placeholder="address" required>
                            @error('address')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                            
                        </div>
                                    
                        <!-- <button class="nextBtn">
                        <span class="btnText">Submit</span>
                        <i class="uil uil-navigator"></i>
                        </button> -->
                    </div>
                    
                </div>
                <button class="btn btn-primary" style="margin:auto;" data-load-more>
                        <span class="spiner"></span>

                        <span>Add Customer</span>
                        </button>

            </div>

           
        </form>
    </div>
 <!--<script src="script.js"></script>-->
@endsection