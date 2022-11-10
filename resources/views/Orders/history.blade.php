@extends('layout')
@extends('layout2')

@section('title','Products')
@section('content')
<div style="max-width: 80vw; margin: auto;"  >
            <h2 class="h2 article-title">Order Invoices</h2>
            <table id="mytable" class="content-table">

              <thead>
                <tr>

                  <th></th>

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
                    {{$transaction->user->name}}
                </td>
                <td>  
                  {{$transaction->customer->company_name}}
                </td>
                <td>
                    {{$transaction->sub_total}}
                </td>
                <td>
                    {{$transaction->date}}
                </td>
                <td style="display:flex;">
                  <a href="{{route('transactions.show', ['transaction'=>$transaction->id])}}" class="btn btn-primary" style="justify-content: center; max-width:100px; margin:auto;">details</a>
                </td>
              </tr>
      @empty
      <h2>There are no sale orders yet.</h2>
      @endforelse
              </tbody>
            </table>
          </div>
@endsection