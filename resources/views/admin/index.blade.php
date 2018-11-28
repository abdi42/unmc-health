@extends('layouts.dashboard',[
  'breadcrumbs' => [
  'Home' => '/',
  'Manage Users' => null
  ]
])

@section('content')
  <div class="container">

    <br>
    <br>
    <title>Users & Roles</title>

    <h3 class='sub-header'>Users & Roles</h3>
    <br>
    <br>

    <a href="{{action('AdminController@create')}}" class="btn btn-success float-right px-4 py-2" role="button">
      <i class="fas fa-plus"></i>
      New user
    </a>
    <br>

    <table class="table table-hover table-borderless mt-4">
      <thead>
      <tr class="m-3">
        <th class='border-0'>Name</th>
        <th class='border-0'>Email</th>
        <th class='border-0'>Role</th>
        <th class='border-0'></th>
        <th class='border-0'></th>
      </tr>
      </thead>
      <tbody id="accordionMedication" class="border bg-white material-card">
      @foreach ($users as $key => $user)
        <tr class="border-bottom">
          <th scope="row">
            {{$user->name}}
          </th>
          <td>{{$user->email}}</td>
          <td>
            {{$user->role->name}}
          </td>
          <td>
            <a class="btn btn-primary" href="{{ action('AdminController@edit', [$user->id]) }}">Edit</a>
          </td>
          <td>
            @if (auth()->user()->hasRole('admin'))
              <form action="/admin/{{$user->id}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" name="action"  class="btn btn-sm btn-danger mt-1"><i class="fas fa-times"></i></button>
              </form>
            @endif
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>

  </div>
@endsection