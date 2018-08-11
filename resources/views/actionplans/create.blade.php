@extends('layouts.master')


@section('content')

    <title>Create Action Plan</title>

    <br><h1>Add Action Plan</h1>


    <form action="/actionplans" method="post">
        <div>
            {{ csrf_field() }}

            <p>Select Subject ID</p>
            <select name="subject"  >
                @foreach($subjects as $subject)
                    <option value="{{ $subject->subject }}" >{{ $subject->subject }}</option>
                @endforeach
            </select><br><br>

            <p><b>To be more physically active</b></p>
            <p>My Goal is:</p>
            <input type="text" name="physically_active" class="form-control" required><br>

            <p><b>To take my medications</b></p>
            <p>My Goal is:</p>
            <input type="text" name="medications" class="form-control" required><br>

            <p><b>To improve my food choices</b></p>
            <p>My Goal is:</p>
            <input type="text" name="food_choices" class="form-control" required><br>

            <p><b>To reduce my stress</b></p>
            <p>My Goal is:</p>
            <input type="text" name="stress" class="form-control" required><br>

            <p><b>To learn about my health problems</b></p>
            <p>My Goal is:</p>
            <input type="text" name="health_problems" class="form-control" required><br>

            <p><b>To achieve my goal I will need to</b></p>
            <p>How much?</p>
            <input type="text" name="how_much" class="form-control" required><br>

            <p>When?</p>
            <input type="text" name="when" class="form-control" required><br>

            <p>How often?</p>
            <input type="text" name="how_often" class="form-control" required><br>

            <p><b>This is how sure I am that I will be able to do my action plan</b></p>
            <input type="radio" name="action_sureness" value=10 checked="checked" >Very sure &nbsp;
            <input type="radio" name="action_sureness" value=5 >Somewhat sure &nbsp;
            <input type="radio" name="action_sureness" value=0 >Not sure at all &nbsp;

            <p><b><br>Possible barriers to my goal</b></p>
            <input type="text" name="barriers" class="form-control" required><br>

            <p><b><br>How I can avoid barriers</b></p>
            <input type="text" name="avoid_barriers" class="form-control" required><br>

            <p><b><br>How well did I meet my goal</b></p>
            <input type="radio" name="goal" value="All of the time"checked="checked">All of the time &nbsp;
            <input type="radio" name="goal" value="More than 50% of the time">More than 50% of the time &nbsp;
            <input type="radio" name="goal" value="Less than 50% of the time">Less than 50% of the time &nbsp;
            <input type="radio" name="goal" value="None of the time">None of the time<br>



            <br>  <button type="submit" class="btn btn-primary">Save</button>&nbsp;
            <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/actionplans") }}'" />
        </div>
    </form>


@endsection
