@extends('layouts.dashboard',[
  'breadcrumbs' => [
  'Home' => '/',
  'Subjects' => '/subjects',
  $subjectId => '/subjects/'. $subjectId,
  "Create" => null
  ]
])

@section('content')

  <title>Medication Time</title>

  <br><h1>Add Medication Time</h1><br>


  <form action="/subjects/{{$subjectId}}/medicationslots" method="post">

    {{ csrf_field() }}

    <div class="accordion" id="medications-accordion">
      <div id="medication-time-0" class="card">
        <div class="card-header" id="heading0">
          <div class="mb-0">
            <button class="col-11 btn btn-link text-left text-body" type="button" data-toggle="collapse"
                    data-target="#collapse0" aria-expanded="true" aria-controls="collapse0">
              Slot #1
            </button>
            <div class="col-1 float-right">
              <button type="button" data-slotindex="0" class="removeSlot btn btn-danger">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </div>
        <div id="collapse0" class="collapse show" aria-labelledby="heading0"
             data-parent="#medications-accordion">
          <div class="card-body">
            <div class="container">
              <div class="row justify-content-center mt-2">
                <div class="col-3 p-0">
                  <label for="medication_time" class="font-weight-bold">Medication Time</label>
                  <div class="input-group">
                    <input type="time" name="slot[][time]"
                           placeholder="Enter your Medication time here"
                           class="form-control px-2 py-1" required>
                    <div class="input-group-append">
                      <i class="input-group-text fas fa-clock"></i>
                    </div>
                  </div>
                </div>
                <div class="col-7">
                  <p class="col-12 font-weight-bold m-0 p-0">Select Day(s) to take medication : </p>
                  <div class="btn-group-toggle" data-toggle="buttons">
                    <label for="slot[0][day][sunday]" class="btn btn-outline-primary active my-2">
                      <input type="checkbox" autocomplete="off" name="slot[0][day][sunday]"
                             value="Sunday" checked> Sun
                    </label>
                    <label for="slot[0][day][monday]" class="btn btn-outline-primary my-2">
                      <input type="checkbox" autocomplete="off" name="slot[0][day][monday]"
                             value="Monday"> Mon
                    </label>
                    <label for="slot[0][day][tuesday]" class="btn btn-outline-primary my-2">
                      <input type="checkbox" autocomplete="off" name="slot[0][day][tuesday]"
                             value="Tuesday"> Tue
                    </label>
                    <label for="slot[0][day][wednesday]" class="btn btn-outline-primary my-2">
                      <input type="checkbox" autocomplete="off" name="slot[0][day][wednesday]"
                             value="Wednesday"> Wed
                    </label>
                    <label for="slot[0][day][thursday]" class="btn btn-outline-primary my-2">
                      <input type="checkbox" autocomplete="off" name="slot[0][day][thursday]"
                             value="Thursday"> Thu
                    </label>
                    <label for="slot[0][day][friday]" class="btn btn-outline-primary my-2">
                      <input type="checkbox" autocomplete="off" name="slot[0][day][friday]"
                             value="Friday"> Fri
                    </label>
                    <label for="slot[0][day][saturday]" class="btn btn-outline-primary my-2">
                      <input type="checkbox" autocomplete="off" name="slot[0][day][saturday]"
                             value="Saturday"> Sat
                    </label>
                  </div>
                </div>
              </div>

              <div class="row justify-content-center my-4 medications-container">
                <div class="col-7 p-0 m-0 medications">
                  <div class="row">
                    <div id="medication0" class="col-6 medication">
                      <label for="medication_name" class="font-weight-bold">Medication Name</label>
                      <input type="text" name="slot[0][medication][0][name]" data-index="0"
                             placeholder="Enter medication name here"
                             class="form-control" required>
                    </div>
                    <div class="col-6">
                      <label for="medication_class" class="font-weight-bold">Medication Class</label>
                      <input type="text" name="slot[0][medication][0][class]" data-index="0"
                             placeholder="Enter class here"
                             class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="col-3 align-self-end">
                  <button type="button" class="addMedication btn btn-link" data-slotindex="0">
                    <i class="fas fa-plus"></i>
                    Add Medication
                  </button>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row mt-5">
      <div class="col-12 mt-2">
        <input type="submit" value="Submit" class="btn btn-success float-right  py-2 mx-3">
        <button id="addSlot" type="button" class="btn btn-primary float-right  py-2 mx-3">
          <i class="fas fa-plus"></i>
          Add Medication Time
        </button>
      </div>
    </div>

  </form>


@endsection
@push('scripts')
  <script src="/js/medicationslots.js"></script>
@endpush
