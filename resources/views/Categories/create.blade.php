@extends('layout')
@extends('layout2')

@section('title','Category')
@section('content')
<div class="container">
        <header>Add Category</header>

        <form method="POST"action="{{route('categories.store')}}">
            @csrf
            <div class="form first">
                
                    

                    <div class="fields">
                        <div class="input-field">
                            <label>Category Name</label>
                            <input type="text" style="width: 300px;" name="category_name" placeholder="Category Name" required>
                            @error('category_name')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="input-field">
                            <label>Description</label>
                            <input type="text" style="width: 300px;" name="description" placeholder="Description" required>
                            @error('description')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        
                    </div>
               
                    <button class="btn btn-primary" data-load-more>
                        <span class="spiner"></span>

                        <span>create category</span>
                        </button>
                
            </div>

           
        </form>
    </div>
 <!--<script src="script.js"></script>-->
@endsection