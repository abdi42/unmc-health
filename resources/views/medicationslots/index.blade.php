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

  <form action="/subjects/{{$subjectId}}/medicationslots" method="post">
    {{ csrf_field() }}

    {{ method_field('PUT') }}
  <div class="accordion" id="medications-accordion">
    @foreach($medicationslots as $i => $slot)
      <input type="hidden" name="slot[{{$i}}][id]" value={{$slot->id}}>
      <div id="medication-time-{{$i}}" class="card">
        <div class="card-header" id="heading{{$i}}">
          <div class="mb-0">
            <button class="col-11 btn btn-link text-left text-body" type="button" data-toggle="collapse"
                    data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}">
              Medication Slot
            </button>
            <div class="col-1 float-right">
              <button type="button" data-slotindex="{{$i}}" class="removeSlot btn btn-danger">
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
                  <input type="time" name="slot[{{$i}}][time]"
                         class="form-control px-2 py-1" required value="{{$slot->medication_time}}">
                  <div class="input-group-append">
                    <i class="input-group-text fas fa-clock"></i>
                  </div>
                </div>
              </div>
              <div class="col-7">
                <p class="col-12 font-weight-bold m-0 p-0">Select Day(s) to take medication : </p>
                <div class="btn-group-toggle" data-toggle="buttons">

                  <label for="slot[{{$i}}][day][sunday]" class="btn btn-outline-primary {{ $slot->sunday ? 'active' : '' }} my-2">
                    <input type="checkbox" autocomplete="off" name="slot[{{$i}}][day][sunday]"
                           value="Sunday" {{ $slot->sunday ? 'checked' : '' }}> Sun
                  </label>
                  <label for="slot[{{$i}}][day][monday]" class="btn btn-outline-primary {{ $slot->monday ? 'active' : '' }} my-2">
                    <input type="checkbox" autocomplete="off" name="slot[{{$i}}][day][monday]"
                           value="Monday" {{ $slot->monday ? 'checked' : '' }}> Mon
                  </label>
                  <label for="slot[{{$i}}][day][tuesday]" class="btn btn-outline-primary {{ $slot->tuesday ? 'active' : '' }} my-2">
                    <input type="checkbox" autocomplete="off" name="slot[{{$i}}][day][tuesday]"
                           value="Tuesday" {{ $slot->tuesday ? 'checked' : '' }}> Tue
                  </label>
                  <label for="slot[{{$i}}][day][wednesday]" class="btn btn-outline-primary {{ $slot->wednesday ? 'active' : '' }} my-2">
                    <input type="checkbox" autocomplete="off" name="slot[{{$i}}][day][wednesday]"
                           value="Wednesday" {{ $slot->wednesday ? 'checked' : '' }}> Wed
                  </label>
                  <label for="slot[{{$i}}][day][thursday]" class="btn btn-outline-primary {{ $slot->thursday ? 'active' : '' }} my-2">
                    <input type="checkbox" autocomplete="off" name="slot[{{$i}}][day][thursday]"
                           value="Thursday" {{ $slot->thursday ? 'checked' : '' }}> Thu
                  </label>
                  <label for="slot[{{$i}}][day][friday]" class="btn btn-outline-primary {{ $slot->friday ? 'active' : '' }} my-2">
                    <input type="checkbox" autocomplete="off" name="slot[{{$i}}][day][friday]"
                           value="Friday" {{ $slot->friday ? 'checked' : '' }}> Fri
                  </label>
                  <label for="slot[{{$i}}][day][saturday]" class="btn btn-outline-primary {{ $slot->saturday ? 'active' : '' }} my-2">
                    <input type="checkbox" autocomplete="off" name="slot[{{$i}}][day][saturday]"
                           value="Saturday" {{ $slot->saturday ? 'checked' : '' }}> Sat
                  </label>
                </div>
              </div>
            </div>

            <div class="row justify-content-center my-4 medications-container">
              <div class="col-7 p-0 m-0 medications">
                @foreach($slot->medicines as $c => $medicine)
                  @if($c == 0)
                    <div class="row">
                      <div id="medication{{$i}}" class="col-6 medication">
                        <input type="hidden" name="slot[{{$i}}][medication][{{$c}}][id]" value={{$medicine->id}}>
                        <label for="medication_name" class="font-weight-bold">Medication Name</label>
                        <input type="text" name="slot[{{$i}}][medication][{{$c}}][name]" data-index="{{$c}}"
                               class="form-control" required value="{{$medicine->medication_name}}" data-existing="true">
                      </div>
                      <div class="col-6">
                        <label for="slot[{{$i}}][medication][{{$c}}][class]" class="font-weight-bold">Medication Class</label>
                        <input type="text" name="slot[{{$i}}][medication][{{$c}}][class]" data-index="{{$c}}"
                               placeholder="Enter class here"
                               class="form-control" required value="{{$medicine->class}}">
                      </div>
                    </div>
                  @else
                    <div class="row">
                      <div id="medication{{$i}}" class="input-group col-6 mb-0 mt-4 medication">
                        <input type="hidden" name="slot[{{$i}}][medication][{{$c}}][id]" value={{$medicine->id}}>
                        <input type="text" name="slot[{{$i}}][medication][{{$c}}][name]" data-index="{{$c}}"
                               class="form-control" required value="{{$medicine->medication_name}}">
                      </div>
                      <div class="col-6 mb-0 mt-4 medication">
                        <input type="text" name="slot[{{$i}}][medication][{{$c}}][class]" data-index="{{$c}}"
                               placeholder="Enter class here"
                               class="form-control" required value="{{$medicine->class}}">
                      </div>
                    </div>
                  @endif
                @endforeach
              </div>
              <div class="col-3 align-self-end">
                <button type="button" class="addMedication btn btn-link" data-slotindex="{{$i}}">
                  <i class="fas fa-plus"></i>
                  Add Medication
                </button>
              </div>
            </div>

          </div>
        </div>
      </div>
    @endforeach
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