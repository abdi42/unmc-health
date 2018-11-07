@extends('layouts.dashboard',[
'breadcrumbs' => [
'Home' => '/',
'Subjects' => '/subjects',
$subject->subject => '/subjects/'. $subject->subject,
"Virtual Visit" => null
]
])

@section('content')
  <title>Virtual Visits</title>

  <div class="container">
    @if($subject->group_type === 3)
      <form action="/subjects/{{$subject->subject}}/virtualvisits" method="post">
        @include('virtualvisits.form')
      </form>
    @else
      <div class="text-center row justify-content-center align-self-center">
        <h3 class='mt-5 mx-3 text-secondary'>
          This subject isn't part of Virtual Visits
        </h3>
      </div>

      <div class="row mt-5">
        <div class="col-12 mt-2">
          <a class="btn btn-success float-right  py-2 mx-3" href="/subjects/{{$subjectId}}/reminders" role="button">Next</a>
        </div>
      </div>
    @endif
  </div>

  </div>
@endsection
@push('scripts')
  <script src="/js/virtualvisit.js"></script>
@endpush