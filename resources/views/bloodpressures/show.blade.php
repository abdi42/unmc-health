@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    $subjectId => '/subjects/' . $subjectId,
    'Blood Pressures' => null
  ]
])


@section('content')
  <div></div>
@endsection

