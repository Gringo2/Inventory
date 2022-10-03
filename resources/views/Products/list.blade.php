@extends('layout')
@extends('layout2')

@section('title','Products')
@section('content')

<div class="table-container">
            <table id="mytable" class="market-table">

              <thead class="table-head">
                <tr class="table-row">

                  <th class="table-heading">Product</th>

                  <th class="table-heading">Description</th>

                  <th class="table-heading">Brand</th>

                  <th class="table-heading">Price</th>

                  <th class="table-heading">In Stock</th>

                  <th class="table-heading">Action</th>

                </tr>
              </thead>

              <tbody class="table-body">
      @forelse($products as $product)
          
          <tr class="table-row">

                <td class="table-data wrapper">
                  <!-- <img src="./assets/images/coin-1.png" width="64" height="64" loading="lazy" alt="BTC"> -->

                  <div>
                    <h3 class="h3 coin-name">{{$product->product_name}}</h3>

                    <span class="span"></span>
                  </div>
                </td>

                <td class="table-data">
                  <data class="data" value="39000">{{$product->description}}</data>
                </td>

                <td class="table-data">
                  <div class="wrapper-flex">
                    <div class="icon red">
                      <ion-icon name="caret-down" aria-hidden="true"></ion-icon>
                    </div>

                    <data class="data" value="-0.04%">{{$product->brand}}</data>
                  </div>
                </td>

                <td class="table-data">
                  <div class="wrapper-flex">
                    <div class="icon red">
                      <ion-icon name="caret-down" aria-hidden="true"></ion-icon>
                    </div>

                    <data class="data" value="-3.26%">{{$product->price}}</data>
                  </div>
                </td>

                <td class="table-data">
                  <div class="wrapper-flex">
                    <div class="icon red">
                      <ion-icon name="caret-down" aria-hidden="true"></ion-icon>
                    </div>

                    <data class="data" value="-7.82%">yes</data>
                  </div>
                </td>

                <td class="table-data">
                  <div class="wrapper-flex">
                    <div class="icon red">
                      <ion-icon name="caret-down" aria-hidden="true"></ion-icon>
                    </div>

                    <data class="data" value="-7.82%"><a href="{{route('products.edit', ['product' => $product->id])}}">Edit</a></data>
                  </div>
                </td>

                </tr>

      @empty
      <h2>There are no products yet.</h2>
      @endforelse

              </tbody>

            </table>
          </div>
@endsection