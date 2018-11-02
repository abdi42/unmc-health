@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    $subject->subject => null
  ]
])

@section('content')
	<title>Subject</title>
	
	<div id="subject-container" class="mt-5">
		<h3 class='sub-header'>Subject: {{$subject->subject}}</h3>
		
		<div id="subject-info" class="card mt-5">
			<div class="card-body mt-3">
				<ul>
					<li>
						<strong>iHealth oAuth:</strong>
						<span class='ml-3'>
							@if ($subject->access_token !== null)
								<span class='text-success'>Authenticated</span>
							@else
								<span class='text-danger'>Pending</span>
							@endif
						</span>
					</li>
					@if ($subject->access_token !== null)
						<li>
							<strong>iHealth UserId:</strong>
							<span class='text-body ml-3'>
								{{$subject->userid}}
							</span>
						</li>
					@endif
					<li>
						<strong>Disease State</strong>
						<span class='text-body ml-3'>
							{{$subject->disease_state}}
						</span>
					</li>
				</ul>
			</div>
			<ul class="list-group">
				<a href="/subjects/{{$subject->subject}}/medicationslots" class="list-group-item px-5 py-3">
					<i class="fas fa-prescription-bottle mr-2 text-danger"></i>
					<strong>Medications</strong>
					<i class="fas fa-angle-right text-secondary float-right"></i>
				</a>
				<a href="/subjects/{{$subject->subject}}/virtualvisits" class="list-group-item px-5 py-3">
					<i class="fas fa-calendar-check mr-2 text-danger"></i>
					<strong>Virtual Visits</strong>
					<i class="fas fa-angle-right text-secondary float-right"></i>
				</a>
				<a href="/subjects/{{$subject->subject}}/questions-results" class="list-group-item px-5 py-3">
					<i class="fas fa-book-open mr-2 text-danger"></i>
					<strong>Health Information Questions Results</strong>
					<i class="fas fa-angle-right text-secondary float-right"></i>
				</a>
				<a href="/subjects/{{$subject->subject}}/weights" class="list-group-item px-5 py-3">
					<i class="fas fa-weight mr-2 text-danger"></i>
					<strong>Weights</strong>
					<i class="fas fa-angle-right text-secondary float-right"></i>
				</a>
				<a href="/subjects/{{$subject->subject}}/bloodpressures" class="list-group-item px-5 py-3">
					<i class="fas fa-heartbeat mr-2 text-danger"></i>
					<strong>Blood Pressure</strong>
					<i class="fas fa-angle-right text-secondary float-right"></i>
				</a>
				<a href="/subjects/{{$subject->subject}}/bloodglucoses" class="list-group-item px-5 py-3">
					<i class="fas fa-notes-medical mr-2 text-danger"></i>
					<strong>Blood Glucose</strong>
					<i class="fas fa-angle-right text-secondary float-right"></i>
				</a>
				<a href="/subjects/{{$subject->subject}}/pulseoxygens" class="list-group-item px-5 py-3">
					<i class="fas fa-hand-holding-heart mr-2 text-danger"></i>
					<strong>Pulse Oxygen</strong>
					<i class="fas fa-angle-right text-secondary float-right"></i>
				</a>
			</ul>

		</div>

@endsection


		{{--@foreach($questionResults as $i => $result)--}}
			{{--<tr>--}}
				{{--<th scope="row">--}}
					{{--{{$result->question->content->category->category}}--}}
				{{--</th>--}}
				{{--<td>--}}
					{{--{{$result->question->text}}--}}
				{{--</td>--}}
				{{--<td>--}}
					{{--<h5><span class="badge badge-secondary">{{$result->attempts}}</span></h5>--}}
				{{--</td>--}}
				{{--<td>--}}
					{{--{{\Carbon\Carbon::parse($result->time,'UTC')->format('M d,  h:m a')}}--}}
				{{--</td>--}}
				{{--<td></td>--}}
			{{--</tr>--}}
	{{--@endforeach--}}
