@extends('layout')
@extends('layout2')

@section('title','Product Stock')
@section('content')

<div style="max-width: 80vw; margin: auto;"  >
            <table id="mytable" >

              <thead>
                <tr>
                  <th>SN</th>

                  <th>Name</th>

                  <th>batch_no</th>

                  <th>expiry_date</th>

                  <th>stock</th>

                </tr>
              </thead>
              <tbody>
      @forelse($productstores as $product)
          
              <tr >
                <td>
                  {{$product->sku}}
                </td>
                <td>
                    <h3 >{{$product->name}}</h3>
                </td>
                <td>
                    {{$product->batch_no}}
                </td>
        
                <td>
                    {{$product->expire_date}}
                </td>
                <td>
                    {{$product->stock}}
                </td>
               
              </tr>

      @empty
      <h2>There are no products yet.</h2>
      @endforelse

              </tbody>

            </table>
          </div>
@endsection