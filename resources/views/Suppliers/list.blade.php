@extends('layout')
@extends('layout2')

@section('title','Suppliers')
@section('content')

<div class="table-container">
            <table id="mytable" class="market-table">

              <thead class="table-head">
                <tr class="table-row">

                  <th class="table-heading">Company Name</th>

                  <th class="table-heading">Email</th>

                  <th class="table-heading">Phone Number</th>

                  <th class="table-heading">Address</th>

                  <th class="table-heading">Action</th>

                </tr>
              </thead>

              <tbody class="table-body">
      @forelse($suppliers as $supplier)
          
          <tr class="table-row">

                <td class="table-data wrapper">
                  <!-- <img src="./assets/images/coin-1.png" width="64" height="64" loading="lazy" alt="BTC"> -->

                  <div>
                    <h3 class="h3 coin-name">{{$supplier->company_name}}</h3>

                    <span class="span"></span>
                  </div>
                </td>

                <td class="table-data">
                  <data class="data" value="39000">{{$supplier->email}}</data>
                </td>

                <td class="table-data">
                  <div class="wrapper-flex">
                    <div class="icon red">
                      <ion-icon name="caret-down" aria-hidden="true"></ion-icon>
                    </div>

                    <data class="data" value="-0.04%">{{$supplier->phone_number}}</data>
                  </div>
                </td>

                <td class="table-data">
                  <div class="wrapper-flex">
                    <div class="icon red">
                      <ion-icon name="caret-down" aria-hidden="true"></ion-icon>
                    </div>

                    <data class="data" value="-3.26%">{{$supplier->address}}</data>
                  </div>
                </td>


                <td class="table-data">
                  <div class="wrapper-flex">
                    <div class="icon red">
                      <ion-icon name="caret-down" aria-hidden="true"></ion-icon>
                    </div>

                    <data class="data" value="-7.82%"><a href="{{route('suppliers.edit', ['supplier' => $supplier->id])}}">Edit</a></data>
                  </div>
                </td>

                </tr>

      @empty
      <h2>There are no customers yet.</h2>
      @endforelse

              </tbody>

            </table>
          </div>
@endsection