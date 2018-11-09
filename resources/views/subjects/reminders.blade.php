@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    strtoupper($subjectId) => '/subjects/'. $subjectId,
    'Reminders' => null
  ]
])


@section('content')
  <title>Reminders</title>
  <h3 class='sub-header'>Reminders</h3>
  <br>
  <h5 class="text-secondary">Here are all the reminders the subject {{$subjectId}} will receive</h5>
  <br>
  <br>

  <div class="card">
    <div class="card-header">Health Information Tips</div>
    <div class="card-body">
      <p class="font-weight-bold">The user will receive reminders every days to take a short quiz</p>
    </div>
  </div>

  <div class="card mt-5">
    <div class="card-header">Virtual visits</div>
    <div class="card-body">
      <b>Zoom URL:</b> {{ $subject->virtual_visit_url }}
      <ul class="list-group list-group-flush ">
        @foreach($virtualVisits as $visit)
          <li class="list-group-item">
            <p class="font-weight-bold">{{\Carbon\Carbon::parse($visit->date,'UTC')->format('M d,  h:m a')}}</p>
            <p class="font-weight-bold">{{$visit->notes}}</p>
          </li>
        @endforeach
      </ul>
    </div>
  </div>

  <div class="card mt-5">
    <div class="card-header">Medications</div>
    <div class="card-body">
      <ul class="list-group list-group-flush ">
        @foreach($medicationsReminders as $reminder)
          <li class="list-group-item"><strong>Every {{$reminder['days']}}</strong>
            <ul>
              @foreach($reminder['medications'] as $medication)
                <li>
                  <p class="mt-3">{{$medication}}</p>
                </li>
              @endforeach
            </ul>
          </li>
        @endforeach
      </ul>
    </div>

  </div>


  <div class="row mt-5">
    <div class="col-12 mt-2">
      <a class="btn btn-success float-right  py-2 mx-3" href="/subjects/{{$subjectId}}/ihealthprompt" role="button">Next</a>
    </div>
  </div>
@endsection