@extends('layout')
@extends('layout2')

@section('title','Category')
@section('content')
<div class="container">
        <header>Add Category</header>

        <form method="POST"action="{{route('categories.update',['category' => $category->id])}}">
            @csrf
            <div class="form first">
                <div class="details personal">
                    

                    <div class="fields">
                        <div class="input-field">
                            <label>Category Name</label>
                            <input type="text" name="category_name" placeholder="{{$category->category_name}}" required>
                            @error('category_name')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="input-field">
                            <label>Description</label>
                            <input type="text" name="description" placeholder="{{$category->description}}" required>
                            @error('description')
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