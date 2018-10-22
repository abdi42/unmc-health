@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    $subjectId => '/subjects/' . $subjectId,
    'Pulse Oxygens' => null
  ]
])

@section('content')
  <div></div>
@endsection
