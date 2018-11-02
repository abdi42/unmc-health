@extends('layouts.dashboard',[
'breadcrumbs' => [
'Home' => '/',
'Subjects' => '/subjects',
$subjectId => '/subjects/'. $subjectId,
"Virtual Visit" => null
]
])

@section('content')
  <title>Virtual Visits</title>

  <div class="container">
    <form action="/subjects/{{$subjectId}}/virtualvisits" method="post">

      {{ csrf_field() }}

      <br>
      <br>

      <div class="row justify-content-center">
        <div id="visit-accordion" class="accordion col-10 ">

          @if (session('status'))
            <div class="alert alert-success mb-5">
              {{ session('status') }}
            </div>
          @endif

          @if ($errors->any())
            <div class="alert alert-danger mb-5">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <h3 class='sub-header mb-5'>Virtual Visits</h3>

          @if($visits)
            @foreach($visits as $i => $visit)
              <div class="card">
                <div id="heading{{$i}}" class="card-header bg-white">
                  <button class="btn btn-link font-weight-bold" type="button" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}">
                    Visit #{{$i + 1}}
                  </button>
                  <input type="hidden" name="visit[{{$i + 1}}][id]" value={{$visit->id}}>
                </div>
                <div id="collapse{{$i}}" class="collapse hide" aria-labelledby="heading{{$i}}" data-parent="#visit-accordion">
                  <div class="card-body">
                    <div class="row justify-content-center mt-2">
                      <div class="col-4">
                        <label for="visit[{{$i + 1}}][date]" class="font-weight-bold">Date </label>
                        <div class="input-group">
                          <input type="date" class="form-control" name="visit[{{$i + 1}}][date]" required value="{{$visit->date_only}}"><br>
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="visit[{{$i + 1}}][time]" class="font-weight-bold">Time</label>
                        <div class="input-group">
                          <input type="time" name="visit[{{$i + 1}}][time]"
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
                          <label for="visit[{{$i + 1}}][notes]" class="font-weight-bold">Notes:</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="visit[{{$i + 1}}][notes]">{{$visit->notes}}</textarea>
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

      <div id="virtual-vists" class="row justify-content-center">

        <div id="visit-0" class="col-10">
          <div class="card mt-5">
            <div class="card-header bg-white">
              <div class="float-left font-weight-bold pt-2 pl-3">
                <p class="text-secondary">New Virtual Visit</p>
              </div>
              <div class="col-1 float-right">
                <button type="button" class="removeVisit btn btn-link" data-index="0">
                  <i class="fas fa-times text-danger"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="row justify-content-center mt-2">
                <div class="col-4">
                  <label for="visit[0][date]" class="font-weight-bold">Date </label>
                  <div class="input-group">
                    <input type="date" class="form-control" name="visit[0][date]" value="date" required><br>
                  </div>
                </div>
                <div class="col-4">
                  <label for="visit[0][time]" class="font-weight-bold">Time</label>
                  <div class="input-group">
                    <input type="time" name="visit[0][time]"
                           class="form-control px-2 py-1" required>
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
                    <label for="visit[0][notes]" class="font-weight-bold">Notes:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="visit[0][notes]"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>



      </div>



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

    </form>
  </div>

  </div>
@endsection
@push('scripts')
  <script src="/js/virtualvisit.js"></script>
@endpush