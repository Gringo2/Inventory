@extends('layout')
@extends('layout2')

@section('title','Products')
@section('content')
<div style="max-width: 80vw; margin: auto;"  >
            <table id="mytable">

              <thead>
                <tr>

                  <th></th>
                  

                  <th>User</th>

                  <th>Supplier</th>

                  <th>SubTotal</th>

                  <th>Purchase Date</th>

                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
      @forelse($purchases as $purchase)
          
              <tr >
                <td></td>
                
                <td>
                    {{$purchase->user->name}}
                </td>
                <td> 
                  {{$purchase->supplier->company_name}} 
                </td>
                <td>
                    {{$purchase->sub_total}}
                </td>
                <td>
                    {{$purchase->date}}
                </td>
                <td>
                  <a href="{{route('purchase.show', ['purchase'=>$purchase->id])}}" class="btn btn-primary" style="justify-content: center;">details</a>
                </td>
              </tr>
      @empty
      <h2>There are no purchases yet.</h2>
      @endforelse
              </tbody>
            </table>
          </div>
@endsection