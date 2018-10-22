@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    $subjectId => '/subjects/' . $subjectId,
    'Weights' => null
  ]
])

@section('content')
  <div></div>
@endsection
