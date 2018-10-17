@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    strtoupper($medicationslots->subject) => "/subjects/" . $medicationslots->subject,
    "Medication Edit" => null
  ]
])

@section('content')

  <title>Edit Medications</title>

  <br><h1>Edit Medication</h1>

  <br>
  <br>

  <form action="/medicationslots/{{ $medicationslots->id }}" method="post">
    {{ csrf_field() }}

    {{ method_field('PUT') }}

    <div id="medication-time-0" class="card">
      <div class="card-header" id="heading0">
        <div class="mb-0">
        </div>
      </div>
      <div class="card-body">
        <div class="container">
          <div class="row justify-content-center mt-2">
            <div class="col-3">
              <label for="medication_time" class="font-weight-bold">Medication Time</label>
              <div class="input-group">
                <input type="time" name="time"
                       class="form-control px-2 py-1" required value="{{$medicationslots->medication_time}}">
                <div class="input-group-append">
                  <i class="input-group-text fas fa-clock"></i>
                </div>
              </div>
            </div>
            <div class="col-7">
              <p class="col-12 font-weight-bold m-0 p-0">Select Day(s) to take medication : </p>
              <div class="btn-group-toggle" data-toggle="buttons">
                <label for="day[sunday]" class="btn btn-outline-primary {{ $medicationslots->sunday ? 'active' : '' }} my-2">
                  <input type="checkbox" autocomplete="off" name="day[sunday]"
                         value="Sunday" {{ $medicationslots->sunday ? 'checked' : '' }}> Sun
                </label>
                <label for="day[monday]" class="btn btn-outline-primary {{ $medicationslots->monday ? 'active' : '' }} my-2">
                  <input type="checkbox" autocomplete="off" name="day[monday]"
                         value="Monday" {{ $medicationslots->monday ? 'checked' : '' }}> Mon
                </label>
                <label for="day[tuesday]" class="btn btn-outline-primary {{ $medicationslots->tuesday ? 'active' : '' }} my-2">
                  <input type="checkbox" autocomplete="off" name="day[tuesday]"
                         value="Tuesday" {{ $medicationslots->tuesday ? 'checked' : '' }}> Tue
                </label>
                <label for="day[wednesday]" class="btn btn-outline-primary {{ $medicationslots->wednesday ? 'active' : '' }} my-2">
                  <input type="checkbox" autocomplete="off" name="day[wednesday]"
                         value="Wednesday" {{ $medicationslots->wednesday ? 'checked' : '' }}> Wed
                </label>
                <label for="day[thursday]" class="btn btn-outline-primary {{ $medicationslots->thursday ? 'active' : '' }} my-2">
                  <input type="checkbox" autocomplete="off" name="day[thursday]"
                         value="Thursday" {{ $medicationslots->thursday ? 'checked' : '' }}> Thu
                </label>
                <label for="day[friday]" class="btn btn-outline-primary {{ $medicationslots->friday ? 'active' : '' }} my-2">
                  <input type="checkbox" autocomplete="off" name="day[friday]"
                         value="Friday" {{ $medicationslots->friday ? 'checked' : '' }}> Fri
                </label>
                <label for="day[saturday]" class="btn btn-outline-primary {{ $medicationslots->saturday ? 'active' : '' }} my-2">
                  <input type="checkbox" autocomplete="off" name="day[saturday]"
                         value="Saturday" {{ $medicationslots->saturday ? 'checked' : '' }}> Sat
                </label>
              </div>
            </div>
          </div>

          <div class="row justify-content-center my-4">
            <div class="col-7 p-0 m-0 medications">
              @foreach($medicationslots->medicines as $i => $medicine)
                @if($i == 0)
                  <div id="medication{{$i}}" class="col-12 medication">
                    <input type="hidden" name="medication_name[{{$i}}][id]" value={{$medicine->id}}>
                    <label for="medication_name" class="font-weight-bold">Medication Name</label>
                    <input type="text" name="medication_name[{{$i}}][name]" data-index="0"
                           class="form-control" required value="{{$medicine->medication_name}}" data-existing="true">
                  </div>
                @else
                  <div id="medication{{$i}}" class="input-group col-12 mb-0 mt-4 medication">
                    <input type="hidden" name="medication_name[{{$i}}][id]" value={{$medicine->id}}>
                    <input type="text" name="medication_name[{{$i}}][name]" data-index="0"
                           class="form-control" required value="{{$medicine->medication_name}}">
                  </div>
                @endif
              @endforeach
            </div>
            <div class="col-3 align-self-end">
              <button id="addMedication" type="button" class="btn btn-link">
                <i class="fas fa-plus"></i>
                Add Medication
              </button>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-12 mt-2">
        <input type="submit" value="Submit" class="btn btn-success float-right  py-2 mx-3">
      </div>
    </div>

  </form>

@endsection
@push('scripts')
  <script type="text/javascript">

      function addMedication() {
          var index = $(`.medication`).length;

          var container = $("<div></div>", {
              id: `medication${index}`,
              class: "input-group col-12 mb-0 mt-4 medication"
          })

          var input = $("<input/>", {
              type: "text",
              name: `medication_name[${index}][name]`,
              plaecholder: "Enter medication name here",
              class: "form-control",
              required: ""
          })

          var inputGroup = $("<div></div>", {
              class: "input-group-append"
          })

          var button = $("<button>", {
              class: "btn btn-danger remove-medication",
              type: "button",
              "data-index": index
          }).click(removeMedication)

          var icon = $("<i>", {
              class: "fas fa-minus"
          })

          button.append(icon)
          inputGroup.append(button)
          container.append(input, inputGroup)

          console.log(container)

          $(`.medications`).append(container)
      }

      function removeMedication() {
          var index = $(this).data('index');
          var exists = $(this).data('existing');

          $(`#medication${index}`).remove();
      }


      $('#addMedication').click(addMedication)
      $('.remove-medication').click(removeMedication)

  </script>
@endpush