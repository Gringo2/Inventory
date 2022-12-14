@extends('layout')
@extends('layout2')

@section('title','Purchase')
@section('content')
<div style="display:flex;">
<div class="table-container">
            <table id="purchase_table" class="content-table">

              <thead>
                <tr>
                  
                  <th>Select</th>

                  <th>ID</th>

                  <th>Product</th>

                  <th>Unit</th>

                 
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
                            <select  name = "supplierid" id = "supplier_id">
                                <option disabled selected>Select Supplier</option>
                                
                                @foreach($suppliers as $supplier)
                                
                                <option value="{{$supplier->id}}">{{$supplier->company_name}}</option>
                               @endforeach
                            </select>
                           
                            
                        </div>
        <table id="selected_purchase_list" class="content-table">
          <thead>
            {{csrf_field()}}
            <tr>  
                  <th>Id</th>
                  <th>Product Name</th>                  
                  <th>Unit Price</th>
                  <th>batch_no</th>
                  <th>Expire Date</th>
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
