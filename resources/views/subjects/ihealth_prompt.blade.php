@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    $subjectId => '/subjects/' . $subjectId,
  ]
])



@section('content')
  <div class="p-5">
    <div class="text-center row justify-content-center align-self-center">
      <div class='w-75'>
        <img src="/img/undraw_health.png" class="img-fluid" alt="Responsive image">
      </div>
      <h3 class='mt-5 mx-3 text-secondary'>
        Subject {{$subjectId}} signed up.
      </h3>
      <h3 class='mt-5 mx-3 text-secondary'>
        Now all that is left is to connect ihealth account to this subject. You can do that by using the mhealth app
      </h3>
    </div>
  </div>
@endsection