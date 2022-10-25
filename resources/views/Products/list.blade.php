@extends('layout')
@extends('layout2')

@section('title','Products')
@section('content')

<div style="max-width: 80vw; margin: auto;"  >
            <table id="mytable" >

              <thead>
                <tr>
                  <th>ID</th>

                  <th>Product</th>

                  <th>Measurement</th>

                  <th >Price</th>
                  
                  <th>retail price</th>

                  <th>Stock</th>

                  <th>Action</th>

                </tr>
              </thead>
              <tbody>
      @forelse($products as $product)
          
              <tr >
                <td>
                  <h3>{{$product->id}}</h3>
                </td>
                <td>
                    <h3 >{{$product->product_name}}</h3>
                </td>
                <td>
                    {{$product->measurement}}
                </td>
        
                <td>
                    {{$product->purchase_price}}
                </td>
                <td>
                    {{$product->retail_price}}
                </td>
                <td>
                    {{$product->stock}}
                </td>
                <td>
                    <span><a href="{{route('products.edit', ['product' => $product->id])}}">Edit</a></span>
                    <span><a href="{{route('products.show', ['product' => $product->id])}}" class="btn btn-primary" style="justify-content: center">details</a></span>
                </td>
              </tr>

      @empty
      <h2>There are no products yet.</h2>
      @endforelse

              </tbody>

            </table>
          </div>
@endsection