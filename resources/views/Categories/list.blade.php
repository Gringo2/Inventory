@extends('layout')
@extends('layout2')

@section('title','Category')
@section('content')

<div style="max-width: 80vw; margin: auto;">
            <table id="mytable">

              <thead>
                <tr>

                  <th>Category Name</th>

                  <th>Description</th>

                  <th>Action</th>

                </tr>
              </thead>

              <tbody>
      @forelse($categories as $category)
          
          <tr>

                <td>
                    {{$category->category_name}}
                </td>

                <td>
                  {{$category->description}}
                </td>
                <td>
                    <a href="{{route('categories.edit', ['category' => $category->id])}}">Edit</a>
                </td>
                </tr>

      @empty
      <h2>There are no category yet.</h2>
      @endforelse

              </tbody>

            </table>
          </div>
@endsection