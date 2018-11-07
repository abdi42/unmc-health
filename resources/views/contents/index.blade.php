@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'HINTS' => null,
  ]
])

@section('content')

  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif


  <title>HINTS</title> <!-- todo: you can't have a title here! -->
  <a href="{{ url("/contents/create") }}" class="btn btn-success float-right px-4 py-2" role="button">
    <i class="fas fa-plus"></i>
    New HINT
  </a>
  <br>
  <br>
  <h2 class='sub-header'>HINTS</h2>


  <div class="card mt-5">
    <div class="table-responsive">

      <table class="table table-hover mt-4">
        <thead>
        <tr>
          <th class='border-0 font-weight-bold' scope="col">#</th>
          <th class='border-0' scope="col">Category</th>
          <th class='border-0' scope="col">Content</th>
          <th class='border-0' scope="col">Questions</th>
          <th class='border-0' scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($contents as $content)
          <tr>
            <th scope="row">
              {{$content->hint_number}}
            </th>
            <td>{{$content->category->category}}</td>
            <td>
              <a href="/contents/{{$content->id}}">
                {{substr($content->content,0,175) . '.......'}}
              </a>
            </td>
            <td>
              <h5><span class="badge badge-secondary">{{count($content->questions)}}</span></h5>
            </td>
            <td>
              <a href="/contents/{{$content->id}}/edit" class="btn btn-primary btn-sm">
                <i class="fas fa-pen"></i>
                Edit
              </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>

    </div>
  </div>

@endsection