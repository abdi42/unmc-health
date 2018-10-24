@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    $subjectId => '/subjects/'. $subjectId,
    'Medications' => null
  ]
])

@section('content')
  <title>Medication Times</title>

  <h4 class='sub-header mt-5'>Medication Times</h4>


  <div class="row">
    <div class="col">
      <a href="/medicationslots/create/{{$subjectId}}" class="btn btn-success float-right" role="button">
        <i class="fas fa-plus"></i>
        Add Times
      </a>
    </div>
  </div>

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
        @foreach($medicationslots as $i => $slot)
          <tr class="border-bottom-0" data-toggle="collapse" data-parent="#accordionMedication"  href="#collapse{{$i}}">
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
          <tr class="collapse-container medications-list border-bottom-0">
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
@endsection
