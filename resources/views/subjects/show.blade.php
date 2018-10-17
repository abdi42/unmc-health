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
				<a href="/weights/{{$subject->userid}}" class="list-group-item px-5 py-3">
					<i class="fas fa-weight mr-2 text-danger"></i>
					<strong>Weights</strong>
					<i class="fas fa-angle-right text-secondary float-right"></i>
				</a>
				<a href="#" class="list-group-item px-5 py-3">
					<i class="fas fa-heartbeat mr-2 text-danger"></i>
					<strong>Blood Pressure</strong>
					<i class="fas fa-angle-right text-secondary float-right"></i>
				</a>
				<a href="#" class="list-group-item px-5 py-3">
					<i class="fas fa-notes-medical mr-2 text-danger"></i>
					<strong>Blood Glucose</strong>
					<i class="fas fa-angle-right text-secondary float-right"></i>
				</a>
				<a href="#" class="list-group-item px-5 py-3">
					<i class="fas fa-hand-holding-heart mr-2 text-danger"></i>
					<strong>Pulse Oxygen</strong>
					<i class="fas fa-angle-right text-secondary float-right"></i>
				</a>
			</ul>
		</div>

		<h4 class='sub-header mt-5'>Medication Times</h4>



		<div class="card mt-3">
			<div class="card-body mt-3">

				<table class="table table-hover table-borderless mt-4">
					<thead>
					<tr>
						<th class='border-0'>Time</th>
						<th class='border-0'>Days</th>
						<th class='border-0'>Medications</th>
						<th class='border-0'></th>
					</tr>
					</thead>
					<tbody id="accordionMedication">
					@foreach($subject->medicationslots as $i => $slot)
						<tr  data-toggle="collapse" data-parent="#accordionMedication" data-target="#collapse{{$i}}">
							<th scope="row">
																	<span>
																		{{date("g:i a", strtotime($slot->medication_time))}}
																	</span>
							</th>
							<td>{{$slot->medication_day}}</td>
							<td>
								<h5><span class="badge badge-secondary">{{count($slot->medicines)}}</span></h5>
							</td>
							<td>
								<a href="/medicationslots/{{$slot->id}}/edit" class="btn btn-primary btn-sm">
									<i class="fas fa-pen"></i>
									Edit
								</a>
							</td>
						</tr>
						<tr class="collapse-container">
							<td colspan="4">
								<div id="collapse{{$i}}" class="collapse" data-parent="#accordionMedication">
									<ul class="list-group">
										@foreach($slot->medicines as $i => $medicine)
											@if($i == 0)
												<li class="list-group-item border-top-0 border-left-0 border-right-0">
													<i class="fas fa-prescription-bottle text-danger mr-5"></i>
													{{$medicine->medication_name}}
												</li>
											@else
												<li class="list-group-item border-left-0 border-right-0">
													<i class="fas fa-prescription-bottle text-danger mr-5"></i>
													{{$medicine->medication_name}}
												</li>
											@endif
										@endforeach
									</ul>
								</div>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>

			</div>
		</div>

	{{-- <p><b>Subject: </b></p>    {{$subject->subject }}<br><br>

	<p><b>Disease State</b></p> {{$subject->disease_state}}<br><br>

	<p><b>Virtual Visit:</b></p>
	@if( $subject->virtualvisit == 1)
		Yes
	@elseif( $subject->virtualvisit == 0)
		No
	@endif

	<p><b>Enrollment Start Date</b></p> {{ $subject->enrollmentdate }}

	<br> <br>  <a href="{{'/subject/'.$subject->subject.'/edit'}}"><button class="btn btn-primary">Edit</button></a><br><br>


	<a href="{{ '/subject/'.$subject->subject.'/delete' }}"><button class="btn btn-primary">Delete</button></a>

	<hr>

	 --}}


@endsection
