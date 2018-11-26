@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    $subjectId => '/subjects/' . $subjectId,
    'Medication Responses' => null,
  ]
])

@section('content')


  <title>Medication Responses</title> <!-- todo: you can't have a title here! -->
  <br>
  <br>
  <h2 class='sub-header'>Medication Responses</h2>


  <div class="card mt-5">
    <div class="table-responsive">

      <table class="table table-hover mt-4">
        <thead>
        <tr>
          <th class='border-0 font-weight-bold' scope="col">Medication Name</th>
          <th class='border-0' scope="col">Did Take</th>
          <th class='border-0' scope="col">Reason</th>
          <th class='border-0' scope="col">Time</th>
        </tr>
        </thead>
        <tbody>
        @foreach($medications as $medication)
          @foreach($medication['responses'] as $response)
            <tr>
              <th scope="row">
                {{$medication['medication_name']}}
              </th>
              <td>{{ ($response->isTaken) ? "Yes" : "No" }}</td>
              <td>{{$response->reason}}</td>
              <td>{{\Carbon\Carbon::parse($response->created_at,'UTC')->format('M d,  h:m a')}}</td>
            </tr>
          @endforeach
        @endforeach
        </tbody>
      </table>

    </div>
  </div>

@endsection