@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    $subjectId => '/subjects/' . $subjectId,
    'Weights' => null
  ]
])

@section('content')
  <br>
  <br>
  <title>Weights</title>

  <h3 class='sub-header'>{{'Subject ' . $subjectId . ' Weight'}}</h3>
  <br>
  <br>
  <div class="card" >
    <ul class="list-group list-group-flush">

      @foreach($weights->WeightDataList as $weight)
        <li class="list-group-item">
          <ul>
            <li>Source: {{$weight->DataSource}}</li>
            <li>BMI: {{$weight->BMI}}</li>
            <li>Weight Value: {{$weight->WeightValue}}</li>
            <li>Last Change: {{ $weight->LastChangeTime }}</li>
          </ul>
        </li>
      @endforeach

    </ul>
  </div>
@endsection
