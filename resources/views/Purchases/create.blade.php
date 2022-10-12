@extends('layout')
@extends('layout2')

@section('title','Purchase')
@section('content')
<div style="display:flex;">
<div class="table-container">
        <form method="Post"action="{{route('purchase.store')}}">
            @csrf
            <input name="total" type="hidden" id="custId" name="custId" value="3487">
          
          <button class="btn btn-primary" data-load-more id="btn_send_purchase_body">
          <span class="spiner"></span>

          <span>create Purchase</span>
        </button>
           
            
        </form>
            <table id="mytable" class="market-table">

              <thead class="table-head">
                <tr class="table-row">
                  
                  <th class="table-heading">Select</th>

                  <th class="table-heading">Product</th>

                  <th class="table-heading">Description</th>

                  <th class="table-heading">Brand</th>

                  <th class="table-heading">Price</th>

                  <th class="table-heading">In Stock</th>

                </tr>
              </thead>

              <tbody class="table-body">
      @forelse($products as $product)
          
          <tr class="table-row">
              <td class="table-data">
              
                      <input type="checkbox" class="selectProduct" name="task-1" id="chk_{{$product->product_name}}" value="{{$product->product_name}}">
             
                    </td>
                <td class="table-data">
                    {{$product->product_name}}                 
                </td>

                <td class="table-data">
                  {{$product->description}}
                </td>

                <td class="table-data">
                  
                    {{$product->brand}}
                 
                </td>

                <td class="table-data">
                  
                    {{$product->price}}
                  
                </td>

                <td class="table-data">
                  

                    yes
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
        <table id="selected_product_list">
          <thead class="table-head">
            <tr class="table-row">
                  <th class="table-heading">Product Name</th>                  
                  <th class="table-heading">UnitPrice</th>
                  <th class="table-heading">Unit</th>
                  <th class="table-heading">Amount</th>
                  <th class="table-heading">Total</th>                 
            </tr>
          </thead>
          <tbody id="purchase_body">
           
            
          </tbody>
        </table>
        

        <button class="btn btn-primary" data-load-more id="btn_send_purchase_body">
          <span class="spiner"></span>

          <span>Place Purchase</span>
        </button>

      </section>
        
</div>

@endsection
