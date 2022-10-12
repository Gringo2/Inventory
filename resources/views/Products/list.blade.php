@extends('layout')
@extends('layout2')

@section('title','Products')
@section('content')

<div >
            <table id="mytable">

              <thead >
                <tr >

                  <th>Product</th>

                  <th>Description</th>

                  <th>Brand</th>

                  <th >Price</th>

                  <th >In Stock</th>

                  <th >Action</th>

                </tr>
              </thead>
              <tbody>
      @forelse($products as $product)
          
              <tr >
                <td>
                    <h3 >{{$product->product_name}}</h3>
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
                </td>
                <td>
                    <a href="{{route('products.edit', ['product' => $product->id])}}">Edit</a>
                </td>
              </tr>

      @empty
      <h2>There are no products yet.</h2>
      @endforelse

              </tbody>

            </table>
          </div>
@endsection