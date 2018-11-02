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
                  <a href="/subject/{{$subject->subject}}/edit" class="btn btn-primary btn-sm">
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


{{-- <div id="subject-accordion">
  <ul class="list-group list-group-flush">
    @foreach ($subjects as $index => $subject)
      <li class="list-group-item">
        <div>
          <a class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$index}}" aria-expanded={{$index==0}} aria-controls="collapse{{$index}}">
            <h4>
              {{strtoupper($subject->subject)}}
            </h4>
          </a>
          <a class="btn btn-link float-right" data-toggle="collapse" data-target="#collapse{{$index}}" aria-expanded={{$index==0}} aria-controls="collapse{{$index}}">
            <i class="fas fa-angle-down text-secondary"></i>
          </a>

        </div>
        <div id="collapse{{$index}}" class="collapse {{$index == 0 ? "show" : ""}}" aria-labelledby="heading{{$index}}" data-parent="#subject-accordion">
          <div class="p-4 pt-5">
            <ul>
              <li>
                <strong>iHealth oAuth:</strong>
                <span class='ml-3'>
                  @if ($subject->access_token !== null)
                    <span class='text-success'>Authenticated</span>
                    <i class="far fa-check-circle text-success"></i>
                  @else
                    <span class='text-danger'>Pending</span>
                    <i class="far fa-times-circle text-danger"></i>
                  @endif
                </span>
              </li>
              @if ($subject->access_token !== null)
                <li>
                  <strong>iHealth UserId:</strong>
                  <span class='text-body ml-3'>
                    {{$subject->userid}}
                  </span>
                </li>
              @endif
              <li>
                <strong>Disease State</strong>
                <span class='text-body ml-3'>
                  {{$subject->disease_state}}
                </span>
              </li>
            </ul>
          </div>
        </div>
      </li>
    @endforeach
  </ul>
</div> --}}
