@extends('layout')
@extends('layout2')

@section('title','Customers')
@section('content')

<div style="max-width: 80vw; margin: auto;">
            <table id="mytable">

              <thead>
                <tr>
                  <th>Company Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
      @forelse($customers as $customer)
          
          <tr class="table-row">

                <td>
                    {{$customer->company_name}}
                </td>

                <td>
                   {{$customer->email}}
                </td>
                <td>
                     {{$customer->phone_number}}
                </td>
                <td>
                     {{$customer->address}}
                </td>
                <td>
                     <a href="{{route('customers.edit', ['customer' => $customer->id])}}">Edit</a>
                </td>
                </tr>

      @empty
      <h2>There are no customers yet.</h2>
      @endforelse

              </tbody>

            </table>
          </div>
@endsection