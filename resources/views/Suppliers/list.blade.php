@extends('layout')
@extends('layout2')

@section('title','Suppliers')
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
      @forelse($suppliers as $supplier)
          
          <tr>
                <td>
                    {{$supplier->company_name}}
                </td>
                <td>
                  {{$supplier->email}}
                </td>
                <td>
                    {{$supplier->phone_number}}
                </td>
                <td>
                    {{$supplier->address}}
                </td>
                <td>
                    <a href="{{route('suppliers.edit', ['supplier' => $supplier->id])}}">Edit</a>
                </td>
          </tr>

      @empty
      <h2>There are no suppliers yet.</h2>
      @endforelse

              </tbody>

            </table>
          </div>
@endsection