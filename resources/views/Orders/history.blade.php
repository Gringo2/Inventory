@extends('layout')
@extends('layout2')

@section('title','Products')
@section('content')
<div style="max-width: 80vw; margin: auto;"  >
            <table id="example">

              <thead>
                <tr>

                  <th></th>
                  <th>ID</th>

                  <th>User</th>

                  <th>customer</th>

                  <th>SubTotal</th>

                  <th>Order Date</th>

                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
      @forelse($transactions as $transaction)
          
              <tr >
                <td></td>
                <td>
                  <h3>{{$transaction->id}}</h3>
                </td>
                <td>
                    {{$transaction->user->name}}
                </td>
                <td>  
                  {{$transaction->customerid}}
                </td>
                <td>
                    {{$transaction->sub_total}}
                </td>
                <td>
                    {{$transaction->date}}
                </td>
                <td>
                  <a href="{{route('transactions.show', ['transaction'=>$transaction->id])}}" class="btn btn-primary" style="justify-content: center;">details</a>
                </td>
              </tr>
      @empty
      <h2>There are no purchases yet.</h2>
      @endforelse
              </tbody>
            </table>
          </div>
@endsection