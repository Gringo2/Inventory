@extends('layout')
@extends('layout2')

@section('title','Purchase')
@section('content')
<div style="display:flex;">
<div class="table-container">
        <form method="Post"action="{{route('purchase.store')}}">
            @csrf
            <input name="total" type="hidden" id="custId" name="custId" value="3487">
          
          <button class="btn btn-primary" data-load-more>
          <span class="spiner"></span>

          <span>create Purchase</span>
        </button>
           
            
        </form>
            <table id="mytable">

              <thead>
                <tr>
                  
                  <th>Select</th>

                  <th>ID</th>

                  <th>Product</th>

                  <th>Description</th>

                  <th>Brand</th>

                  <th>Price</th>

                  <th>In Stock</th>

                </tr>
              </thead>

              <tbody>
      @forelse($products as $product)
          
          <tr>
              <td>

                      <input type="checkbox" class="selectProduct" name="task-1" id="chk_{{$product->product_name}}" value="{{$product->product_name}}">
             
                    </td>
                <td>
                  {{$product->id}}
                </td>
                <td>
                    {{$product->product_name}}                 
                </td>

                <td>
                  {{$product->description}}
                </td>

                <td>
                  
                    {{$product->brand}}
                 
                </td>

                <td>
                  
                    {{$product->price}}
                  
                </td>

                <td>
                  

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
          <thead>
            {{csrf_field()}}
            <tr>
                  <th>Product Name</th>                  
                  <th>UnitPrice</th>
                  <th>Unit</th>
                  <th>Amount</th>
                  <th>Total</th>                 
            </tr>
          </thead>
          <tbody id="purchase_body">
           
            
          </tbody>
        </table>

        <div id="subtotal" style="float:right;"></div>
        

        <button class="btn btn-primary" data-load-more id="btn_send_purchase_body">
          <span class="spiner"></span>

          <span>Place Purchase</span>
        </button>

      </section>
        
</div>

@endsection
