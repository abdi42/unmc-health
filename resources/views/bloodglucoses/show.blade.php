@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    $subjectId => '/subjects/' . $subjectId,
    'Blood Glucose' => null
  ]
])

@section('content')
  <div></div>
@endsection
