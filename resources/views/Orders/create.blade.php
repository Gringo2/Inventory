@extends('layout')
@extends('layout2')

@section('title','Purchase')
@section('content')
<div style="display:flex;">
<div class="table-container">
            <table id="mytable">

              <thead>
                <tr>
                  
                  <th>Select</th>

                  <th>ID</th>

                  <th>Product</th>

                  <th>Measurement</th>

                 

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
                  {{$product->measurement}}
                </td>
                <td>
                    {{$product->retail_price}}
                </td>

                <td>
                    yes
                </td>

                

                </tr>

      @empty
      <h2>There are no products yet.</h2>
      @endforelse

              </tbody>

            </table>
</div>
<section class="tasks">
        <div class="input-field">
                            <label>Supplier  </label>
                            <select  name = "supplierid">
                                <option disabled selected>Select Customer</option>
                                
                                @foreach($customers as $customer)
                                
                                <option value="{{$supplier->id}}">{{$customer->company_name}}</option>
                               @endforeach
                            </select>
                           
                            
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
