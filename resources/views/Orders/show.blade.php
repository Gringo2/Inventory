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

                  <th>amount</th>

                  <th>total</th>

                  <th>action</th>

                </tr>
              </thead>
              <tbody>
      @forelse($transactionlines as $transactionline)
          
              <tr >
                <td>
                  <h3>{{$transactionline->id}}</h3>
                </td>
                <td>
                    <h3 >{{$transactionline->product_name}}</h3>
                </td>
                <td>
                    {{$transactionline->amount}}
                </td>
                <td>
                    {{$transactionline->total}}
                </td>
                <td>
                <td>
                  <a href="{{route('transactions.detail', ['transactionline'=>$transactionline->id,])}}" class="btn btn-primary" style="justify-content: center;">details</a>
                </td>
                </td>
              </tr>

      @empty
      <h2>There are no products yet.</h2>
      @endforelse

              </tbody>

            </table>
          </div>
@endsection