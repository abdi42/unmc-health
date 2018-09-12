@extends('layouts.master')

@section('content')
  <br>
  <br>
  <title>iHealth Subjects</title>
  <h1>iHealth Subject ID</h1>
  <br>
  <br>
  <div class="card" >
    <div class="card-header">
      The Subjects are:
    </div>
    <ul class="list-group list-group-flush">
      @foreach ($users as $key => $user)
        <li class="list-group-item">
          <ul>
            @foreach ($user as $key => $value)
              @if ($key !== 'logo')
                <li>{{$key}} : {{$value}}</li>
              @endif
            @endforeach
          </ul>
        </li>
      @endforeach
    </ul>
  </div>
@endsection
    
