@extends('layout')
@extends('layout2')

@section('title','Products')
@section('content')
<div style="max-width: 80vw; margin: auto;"  >
            <table id="example" class="display" >

              <thead>
                <tr>

                  <th></th>
                  <th>ID</th>

                  <th>User</th>

                  <th>Supplier</th>

                  <th>SubTotal</th>

                  <th >Purchase Date</th>

                </tr>
              </thead>
              <tbody>
      @forelse($purchases as $purchase)
          
              <tr >
                <td></td>
                <td>
                  <h3>{{$purchase->id}}</h3>
                </td>
                <td>
                    {{$purchase->user->name}}
                </td>
                <td>  
                </td>
                <td>
                    {{$purchase->sub_total}}
                </td>
                <td>
                </td>
              </tr>
      @empty
      <h2>There are no purchases yet.</h2>
      @endforelse
              </tbody>
            </table>
          </div>
@endsection