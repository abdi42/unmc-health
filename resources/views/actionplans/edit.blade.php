@extends('layouts.master')

@section('content')

 <title>Edit Action Plans</title>

 <br><h1>Edit Action Plan</h1><br>

 <form action="/actionplans/{{ $actionplans->id }}" method="post">
    {{ csrf_field() }}

    {{ method_field('PUT') }}



     <p><b>To be more physically active</b></p>
     <p>My Goal is:</p>
     <input type="text" name="physically_active" class="form-control" value="{{ $actionplans->physically_active }}" required><br>

     <p><b>To take my medications</b></p>
     <p>My Goal is:</p>
     <input type="text" name="medications" class="form-control" value="{{ $actionplans->medications }}" required><br>

     <p><b>To improve my food choices</b></p>
     <p>My Goal is:</p>
     <input type="text" name="food_choices" class="form-control" value="{{ $actionplans->food_choices }}" required><br>

     <p><b>To reduce my stress</b></p>
     <p>My Goal is:</p>
     <input type="text" name="stress" class="form-control" value="{{ $actionplans->stress }}" required><br>

     <p><b>To learn about my health problems</b></p>
     <p>My Goal is:</p>
     <input type="text" name="health_problems" class="form-control" value="{{ $actionplans->health_problems }}"required><br>

     <p><b>To achieve my goal I will need to</b></p>
     <p>How much?</p>
     <input type="text" name="how_much" class="form-control" value="{{ $actionplans->how_much }}" required><br>

     <p>When?</p>
     <input type="text" name="when" class="form-control" value="{{ $actionplans->when }}"required><br>

     <p>How often?</p>
     <input type="text" name="how_often" class="form-control" value="{{ $actionplans->how_much }}"required><br>

     <p><b>This is how sure I am that I will be able to do my action plan</b></p>
     <input type="radio" name="action_sureness" value=10 checked="checked" >Very sure &nbsp;
     <input type="radio" name="action_sureness" value=5 >Somewhat sure &nbsp;
     <input type="radio" name="action_sureness" value=0 >Not sure at all &nbsp;

     <p><b><br>Possible barriers to my goal</b></p>
     <input type="text" name="barriers" class="form-control" value="{{ $actionplans->barriers }}" required><br>

     <p><b><br>How I can avoid barriers</b></p>
     <input type="text" name="avoid_barriers" class="form-control" value="{{ $actionplans->avoid_barriers }}" required><br>

     <p><b><br>How well did I meet my goal</b></p>
     <input type="radio" name="goal" value="All of the time"checked="checked">All of the time &nbsp;
     <input type="radio" name="goal" value="More than 50% of the time">More than 50% of the time &nbsp;
     <input type="radio" name="goal" value="Less than 50% of the time">Less than 50% of the time &nbsp;
     <input type="radio" name="goal" value="None of the time">None of the time<br>


     <br> <button type="submit" class="btn btn-primary">Update</button> &nbsp;
 <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/actionplans") }}'" />

 </form>
@endsection