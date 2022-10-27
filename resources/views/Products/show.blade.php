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

                  <th>status</th>

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
                <td>
                    {{$product->month_to_expire}}
                    <!-- <li class="progress-item"> -->

              <!-- <div class="progress-label">
                <p class="progress-title">Project Completion</p>

                <data class="progress-data" value="85">85%</data>
              </div> -->

              <div class="progress-bar" style="max-width:40px;">
                <div class="progress" style="--width: 100%; --bg: var(--blue-ryb);"></div>
              </div>

            <!-- </li> -->
                </td>
               
              </tr>

      @empty
      <h2>There are no products yet.</h2>
      @endforelse

              </tbody>

            </table>
          </div>
@endsection