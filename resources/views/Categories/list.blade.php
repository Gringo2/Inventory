@extends('layout')
@extends('layout2')

@section('title','Category')
@section('content')

<div class="table-container">
            <table id="mytable" class="market-table">

              <thead class="table-head">
                <tr class="table-row">

                  <th class="table-heading">Category Name</th>

                  <th class="table-heading">Description</th>

                  <th class="table-heading">Action</th>

                </tr>
              </thead>

              <tbody class="table-body">
      @forelse($categories as $category)
          
          <tr class="table-row">

                <td class="table-data wrapper">
                  <!-- <img src="./assets/images/coin-1.png" width="64" height="64" loading="lazy" alt="BTC"> -->

                  <div>
                    <h3 class="h3 coin-name">{{$category->category_name}}</h3>

                    <span class="span"></span>
                  </div>
                </td>

                <td class="table-data">
                  <data class="data" value="39000">{{$category->description}}</data>
                </td>

                <td class="table-data">
                  <div class="wrapper-flex">
                    <div class="icon red">
                      <ion-icon name="caret-down" aria-hidden="true"></ion-icon>
                    </div>

                    <data class="data" value="-7.82%"><a href="{{route('categories.edit', ['category' => $category->id])}}">Edit</a></data>
                  </div>
                </td>

                </tr>

      @empty
      <h2>There are no category yet.</h2>
      @endforelse

              </tbody>

            </table>
          </div>
@endsection