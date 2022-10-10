@extends('layout')
@extends('layout2')

@section('title','Purchase')
@section('content')
<div style="display:flex;">
<div class="table-container">
            <table id="mytable" class="market-table">

              <thead class="table-head">
                <tr class="table-row">
                  
                  <th class="table-heading">Select</th>

                  <th class="table-heading">Product</th>

                  <th class="table-heading">Description</th>

                  <th class="table-heading">Brand</th>

                  <th class="table-heading">Price</th>

                  <th class="table-heading">In Stock</th>

                  <th class="table-heading">Action</th>

                </tr>
              </thead>

              <tbody class="table-body">
      @forelse($products as $product)
          
          <tr class="table-row">
              <td class="table-data">
              
                      <input type="checkbox" class="selectProduct" name="task-1" id="chk_{{$product->product_name}}" value="{{$product->product_name}}">
             
                    </td>
                <td class="table-data">

                  <div>
                    <h3 class="h3">{{$product->product_name}}</h3>

                    <span class="span"></span>
                  </div>
                </td>

                <td class="table-data">
                  <data class="data" value="">{{$product->description}}</data>
                </td>

                <td class="table-data">
                  <div class="wrapper-flex">
                    
                    <data class="data" value="">{{$product->brand}}</data>
                  </div>
                </td>

                <td class="table-data">
                  <div class="wrapper-flex">
                    <data class="data" value="">{{$product->price}}</data>
                  </div>
                </td>

                <td class="table-data">
                  <div class="wrapper-flex">

                    <data class="data" value="">yes</data>
                  </div>
                </td>

                <td class="table-data">
                  <div class="wrapper-flex">

                    <data class="data" value=""><a href="{{route('products.edit', ['product' => $product->id])}}">Edit</a></data>
                  </div>
                </td>

                </tr>

      @empty
      <h2>There are no products yet.</h2>
      @endforelse

              </tbody>

            </table>
</div>
<section class="tasks">

        <div class="section-title-wrapper">
          <h2 class="section-title">Purchase</h2>

          <button class="btn btn-link icon-box">
            <span>View All</span>

            <span class="material-symbols-rounded  icon" aria-hidden="true">arrow_forward</span>
          </button>
        </div>
        <table>
          <thead class="table-head">
            <tr class="table-row">
                  <th class="table-heading">Product Name</th>
                  <th class="table-heading">Unit</th>                   
                  <th class="table-heading">UnitPrice</th>
                  <th class="table-heading">Total</th>                 
            </tr>
          </thead>
          <tbody id ="selected_product_list" >
           
            
          </tbody>
        </table>
        

        <button class="btn btn-primary" data-load-more>
          <span class="spiner"></span>

          <span>Place Purchase</span>
        </button>

      </section>
        
</div>

@endsection
