@extends('layout')
@extends('layout2')

@section('title','Purchase')
@section('content')
<div style="display:flex;">
<div class="table-container">
            <table id="mytable" class="content-table">

              <thead>
                <tr>
                  
                  <th>Select</th>

                  <th>ID</th>

                  <th>Product</th>

                  <th>Unit</th>

                  <th>wholesale</th>

                  <th>Price</th>
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
                  {{$product->wholesale}}
                </td>
                <td>
                  {{$product->purchase_price}}
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
                            <label style="margin-left: 5px; font-size:15px;">Customer</label>
                            <select  name = "supplierid" id="customer_id">
                                <option disabled selected>Select Customer</option>
                                
                                @foreach($customers as $customer)
                                
                                <option value="{{$customer->id}}">{{$customer->company_name}}</option>
                               @endforeach
                            
                            </select>
                            <div style = "display:flex">
                           
                            <input type="checkbox" style="height:23px; margin:0; margin-left:5px;" class="select" name="task-1" id="wholesale" value="{{$product->product_name}}">
                            <label style="margin-left: 5px; font-size:15px;">Wholesale</label>
                            </div>
                           
                            
                        </div>
        <table id="selected_product_list" class="content-table">
          <thead>
            {{csrf_field()}}
            <tr>  
                  <th>id</th>
                  <th>ProductName</th>                  
                  <th>UnitPrice</th>
                  <th>Amount</th>
                  <th>Total</th>                 
            </tr>
          </thead>
          <tbody id="purchase_body">
           
            
          </tbody>
        </table>

        <div id="subtotal" style="float:right;"></div>
        

        <button class="btn btn-primary" data-load-more id="btn_send_order_body">
          <span class="spiner"></span>

          <span>Place Order</span>
        </button>

      </section>
        
</div>

@endsection
