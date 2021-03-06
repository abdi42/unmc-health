{{ csrf_field() }}

<br>
<br>

<div class="row justify-content-center">
  <div id="visit-accordion" class="accordion col-10 ">


    <h3 class='sub-header mb-5'>Virtual Visits</h3>



    @if($visits)
        <div class="card">
          <div class="card-body">
            <label for="virtual_visit_url"  class="font-weight-bold">Zoom Link/URL for this subject's virtual visits:</label>
            <input type="text" name="virtual_visit_url" id="virtual_visit_url" class="form-control" value="{{$subject->virtual_visit_url}}">
            <em>This link will be used to allow the subject to open Zoom on their device.</em><br>
            <em>Must be unique per subject.</em>
          </div>
        </div>
      @foreach($visits as $i => $visit)
        <div class="card">
          <div id="heading{{$i}}" class="card-header bg-white">
            <button class="btn btn-link font-weight-bold" type="button" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}">
              Visit #{{$i}}
            </button>
            <input type="hidden" name="visit[{{$i}}][id]" value={{$visit->id}}>
          </div>
          <div id="collapse{{$i}}" class="collapse hide" aria-labelledby="heading{{$i}}" data-parent="#visit-accordion">
            <div class="card-body">
              <div class="row justify-content-center mt-2">
                <div class="col-4">
                  <label for="visit[{{$i}}][date]" class="font-weight-bold">Date </label>
                  <div class="input-group">
                    <input type="date" class="form-control " name="visit[{{$i}}][date]" required value="{{$visit->date_only}}"><br>
                  </div>
                </div>
                <div class="col-4">
                  <label for="visit[{{$i}}][time]" class="font-weight-bold">Time</label>
                  <div class="input-group">
                    <input type="time" name="visit[{{$i}}][time]"
                           class="form-control px-2 py-1" required value="{{$visit->time}}">
                    <div class="input-group-append">
                      <i class="input-group-text fas fa-clock"></i>
                    </div>
                  </div>
                </div>
                <div class="col-2"></div>
              </div>
              <div class="row justify-content-center">
                <div class="col-10">
                  <div class="form-group mt-4">
                    <label for="visit[{{$i}}][notes]" class="font-weight-bold">Notes:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="visit[{{$i}}][notes]">{{$visit->notes}}</textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    @endif

  </div>
</div>

<div id="virtual-vists" class="row justify-content-center"></div>



<br>
<br>

<div class="row mt-5">
  <div class="col-12 mt-2">
    <input type="submit" value="Submit" class="btn btn-success float-right  py-2 mx-3">
    <button id="addVisit" type="button" class="btn btn-primary float-right  py-2 mx-3">
      <i class="fas fa-plus"></i>
      Add Virtual Visit
    </button>
  </div>
</div>

