@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    $subjectId => '/subjects/' . $subjectId,
    'Hints Results' => null
  ]
])

@section('content')
  <title>Health Information Tips Results</title>
  
  <div id="subject-container" class="mt-5">
    <h3 class='sub-header'>Subject: {{$subjectId}} Hints Questions Result</h3>
    
    <br>
    <br>
    
    <div class="card mt-3">
      <div class="card-body mt-3">
        <table class="table table-hover table-borderless mt-4">
          <thead>
          <tr>
            <th class='border-0'>Category</th>
            <th class='border-0'>Question</th>
            <th class='border-0'>Attempts</th>
            <th class='border-0'>Time</th>
            <th class='border-0'></th>
          </tr>
          </thead>
          <tbody id="accordionMedication">
          @foreach($questionResults as $i => $result)
            <tr>
              <th scope="row">
                {{$result->question->content->category->category}}
              </th>
              <td>
                {{$result->question->text}}
              </td>
              <td>
                <h5><span class="badge badge-secondary">{{$result->attempts}}</span></h5>
              </td>
              <td>
                {{\Carbon\Carbon::parse($result->time,'UTC')->format('M d,  h:m a')}}
              </td>
              <td></td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection
