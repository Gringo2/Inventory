@extends('layout')
@extends('layout2')

@section('title','Purchase')
@section('content')

<div style="max-width: 80vw; margin: auto;"  >
            <table id="mytable" >

              <thead>
                <tr>
                  <th>ID</th>

                  <th>Product Name</th>

                  <th>batch_no</th>

                  <th>expiry_date</th>

                  <th>amount</th>

                  <th>total</th>

                </tr>
              </thead>
              <tbody>
      @forelse($purchaselines as $purchaseline)
          
              <tr >
                <td>
                  <h3>{{$purchaseline->id}}</h3>
                </td>
                <td>
                    <h3 >{{$purchaseline->product_name}}</h3>
                </td>
                <td>
                    {{$purchaseline->batch_no}}
                </td>
        
                <td>
                    {{$purchaseline->expire_date}}
                </td>
                <td>
                    {{$purchaseline->amount}}
                </td>
                <td>
                    {{$purchaseline->total}}
                </td>
               
              </tr>

      @empty
      <h2>There are no products yet.</h2>
      @endforelse

              </tbody>

            </table>
          </div>
@endsection