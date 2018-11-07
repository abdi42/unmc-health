@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => null,
  ]
])


@section('content')
  <div class="subject-container">
    <title>Subjects</title><br>
    <a href="/subjects/create" class="btn btn-success float-right px-4 py-2" role="button">
      <i class="fas fa-plus"></i>
      New Subject
    </a>
    <br>
    <div class="card mt-5">
      <div class='pb-3'>

        <table class="table table-hover mt-4">
          <thead>
          <tr>
            <th class='border-0'>
              <span class="ml-3">Subject</span>
            </th>
            <th class='border-0'>iHealth</th>
            <th class='border-0'>Disease State</th>
            <th class='border-0'>Group</th>
            <th class='border-0'></th>
          </tr>
          </thead>
          <tbody>
          @foreach($subjects as $subject)
            <tr>
              <th scope="row">
                <a href="/subjects/{{$subject->subject}}" class="ml-3">{{$subject->subject}}</a>
              </th>
              <td>
                @if ($subject->access_token !== null)
                  <span class='text-success'>Authenticated</span>
                @else
                  <span class='text-danger'>Pending</span>
                @endif
              </td>
              <td>{{$subject->disease_state}}</td>
              <td>{{$subject->group_type}}</td>
              <td>
                <a href="/subjects/{{$subject->subject}}/edit" class="btn btn-primary btn-sm">
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

  </div>
@endsection