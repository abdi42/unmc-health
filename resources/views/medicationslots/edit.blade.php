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
        <div class="card-body">
          <div class="container">
            <div class="row justify-content-center mt-2">
              <div class="col-3 p-0">
                <label for="medication_time" class="font-weight-bold">Medication Time</label>
                <div class="input-group">
                  <input type="time" name="slot[][time]"
                         class="form-control px-2 py-1" required value="{{$medicationslots->medication_time}}">
                  <div class="input-group-append">
                    <i class="input-group-text fas fa-clock"></i>
                  </div>
                </div>
              </div>
              <div class="col-7">
                <p class="col-12 font-weight-bold m-0 p-0">Select Day(s) to take medication : </p>
                <div class="btn-group-toggle" data-toggle="buttons">

                  <label for="slot[0][day][sunday]" class="btn btn-outline-primary {{ $medicationslots->sunday ? 'active' : '' }} my-2">
                    <input type="checkbox" autocomplete="off" name="slot[0][day][sunday]"
                           value="Sunday" {{ $medicationslots->sunday ? 'checked' : '' }}> Sun
                  </label>
                  <label for="slot[0][day][monday]" class="btn btn-outline-primary {{ $medicationslots->monday ? 'active' : '' }} my-2">
                    <input type="checkbox" autocomplete="off" name="slot[0][day][monday]"
                           value="Monday" {{ $medicationslots->monday ? 'checked' : '' }}> Mon
                  </label>
                  <label for="slot[0][day][tuesday]" class="btn btn-outline-primary {{ $medicationslots->tuesday ? 'active' : '' }} my-2">
                    <input type="checkbox" autocomplete="off" name="slot[0][day][tuesday]"
                           value="Tuesday" {{ $medicationslots->tuesday ? 'checked' : '' }}> Tue
                  </label>
                  <label for="slot[0][day][wednesday]" class="btn btn-outline-primary {{ $medicationslots->wednesday ? 'active' : '' }} my-2">
                    <input type="checkbox" autocomplete="off" name="slot[0][day][wednesday]"
                           value="Wednesday" {{ $medicationslots->wednesday ? 'checked' : '' }}> Wed
                  </label>
                  <label for="slot[0][day][thursday]" class="btn btn-outline-primary {{ $medicationslots->thursday ? 'active' : '' }} my-2">
                    <input type="checkbox" autocomplete="off" name="slot[0][day][thursday]"
                           value="Thursday" {{ $medicationslots->thursday ? 'checked' : '' }}> Thu
                  </label>
                  <label for="slot[0][day][friday]" class="btn btn-outline-primary {{ $medicationslots->friday ? 'active' : '' }} my-2">
                    <input type="checkbox" autocomplete="off" name="slot[0][day][friday]"
                           value="Friday" {{ $medicationslots->friday ? 'checked' : '' }}> Fri
                  </label>
                  <label for="slot[0][day][saturday]" class="btn btn-outline-primary {{ $medicationslots->saturday ? 'active' : '' }} my-2">
                    <input type="checkbox" autocomplete="off" name="slot[0][day][saturday]"
                           value="Saturday" {{ $medicationslots->saturday ? 'checked' : '' }}> Sat
                  </label>
                </div>
              </div>
            </div>

            <div class="row justify-content-center my-4 medications-container">
              <div class="col-7 p-0 m-0 medications">
                @foreach($medicationslots->medicines as $i => $medicine)
                  @if($i == 0)
                    <div class="row">
                      <div id="medication{{$i}}" class="col-6 medication">
                        <input type="hidden" name="slot[0][medication][{{$i}}][id]" value={{$medicine->id}}>
                        <label for="medication_name" class="font-weight-bold">Medication Name</label>
                        <input type="text" name="slot[0][medication][{{$i}}][name]" data-index="0"
                               class="form-control" required value="{{$medicine->medication_name}}" data-existing="true">
                      </div>
                      <div class="col-6">
                        <label for="medication[{{$i}}][class]" class="font-weight-bold">Medication Class</label>
                        <input type="text" name="slot[0][medication][{{$i}}][class]" data-index="0"
                               placeholder="Enter class here"
                               class="form-control" required value="{{$medicine->class}}">
                      </div>
                    </div>
                  @else
                    <div class="row">
                      <div id="medication{{$i}}" class="input-group col-6 mb-0 mt-4 medication">
                        <input type="hidden" name="slot[0][medication][{{$i}}][id]" value={{$medicine->id}}>
                        <input type="text" name="slot[0][medication][{{$i}}][name]" data-index="0"
                               class="form-control" required value="{{$medicine->medication_name}}">
                      </div>
                      <div class="col-6 mb-0 mt-4 medication">
                        <input type="text" name="slot[0][medication][{{$i}}][class]" data-index="0"
                               placeholder="Enter class here"
                               class="form-control" required value="{{$medicine->class}}">
                      </div>
                    </div>
                  @endif
                @endforeach
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