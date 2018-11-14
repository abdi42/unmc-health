@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    $subject->subject => null
  ]
])
@section('content')
    <title>Edit Subject</title>




    <br><h1>Edit Subject</h1><br>


    <form action="/subjects/{{$subject->subject}}" method="post">


        {{ csrf_field() }}

        {{method_field('PUT')}}


        <p>Enter Subject Code</p>
        <input type="text" name="id" placeholder="Enter your subject code here" class="form-control" value="{{ $subject->subject }}" readonly><br>

        <p>Enter your PIN </p>
        <input type="password" name="pin" placeholder="Enter a new PIN here to change it for the subject" class="form-control" value="">
        <em>Will only update if a new PIN is entered here.</em><br>

        <br>    <p>Enter the iHealth User ID </p>
        <input type="text" name="userid" placeholder="Enter your iHealth userid here" class="form-control" value="{{ $subject->userid }}">

        <br><p>Search iHealth User ID here</p>
       <input type="button" name="iHealth ID"  value="Search iHealth ID" class="btn btn-primary"  onclick="window.location='{{ url("/subjects/ihealth") }}'" /> <br>



        <br>  <p>Select Disease(s) that apply</p>
        <input type="checkbox" name="disease[]"  value="Heart" checked="checked"> Heart Failure &nbsp;
        <input type="checkbox" name="disease[]"  value="HyperTension"> Hyper Tension &nbsp;
        <input type="checkbox" name="disease[]"  value="COPD"> COPD &nbsp;
        <input type="checkbox" name="disease[]"  value="Diabetes"> Diabetes &nbsp;<br>

        <br> <p>Select the intervention group for this subject:</p>
        <select name="group_type" id="group_type" class="form-control" disabled>
            <option value="">Choose one</option>
            <option value="1" {{ $subject->group_type == 1 ? "selected" : '' }}>{{App\Subject::GROUP_TYPE_1_TEXT}}</option>
            <option value="2" {{ $subject->group_type == 2 ? "selected" : '' }}>{{App\Subject::GROUP_TYPE_2_TEXT}}</option>
            <option value="3" {{ $subject->group_type == 3 ? "selected" : '' }}>{{App\Subject::GROUP_TYPE_3_TEXT}}</option>
        </select>
        <br>
        <div class="form-notes">
            <em>Selecting the intervention group will determine the features available to the subject in the app.</em>
        </div>
        <br>

        <br>


        <br> <p>Enrollment Start Date</p>
        <input type="date" name="enrollmentdate" id="enrollmentdate" class="form-control col-sm-2" value="{{ $subject->enrollmentdate }}" readonly><br>


        <br> <p>Enrollment Stop Notifications Date</p>
        <input type="date" name="enrollment_end_notifications_date" id="enrollment_end_notifications_date" class="form-control col-sm-2" value="{{ $subject->enrollment_end_notifications_date }}" required>
        <a href="javascript:auto_calculate_enrollment_end_date('enrollment_end_notifications_date','{{\App\Subject::ENROLLMENT_NOTIFICATION_DAYS}}')" >Click here to auto-calculate +{{\App\Subject::ENROLLMENT_NOTIFICATION_DAYS}} days from enrollment</a>
        <br>
        <div class="form-notes">
            <em>This date is used to disable subject reminders in the app. Not used for Group 1.</em>
        </div>


        <br> <p>Enrollment End Date</p>
        <input type="date" name="enrollment_end_date" id="enrollment_end_date" class="form-control col-sm-2" value="{{ $subject->enrollment_end_date }}" required>
        <a href="javascript:auto_calculate_enrollment_end_date('enrollment_end_date','{{\App\Subject::ENROLLMENT_LENGTH_DEFAULT_DAYS}}')" >Click here to auto-calculate +{{\App\Subject::ENROLLMENT_LENGTH_DEFAULT_DAYS}} days from enrollment</a>
        <br>
        <div class="form-notes">
            <em>This date is used to block subject access to the app.</em>
        </div>



        <br> <button type="submit" class="btn btn-primary">Update</button> &nbsp;
        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/subjects") }}'" />

    </form>

    <script>
        function auto_calculate_enrollment_end_date(field_string,num_days) {
            var e = document.getElementById('enrollmentdate');
            var f = document.getElementById(field_string);
            var d = new Date(e.value);
            d.setDate(d.getDate() + parseInt(num_days));
            f.value = yyyy_mm_dd(d);

        }
        function yyyy_mm_dd(dateish) {
            var now = new Date(dateish);
            var y = now.getFullYear();
            var m = now.getMonth()+1;
            var d = now.getDate();
            return '' + y + "-" + (m < 10 ? '0' : '') + m + "-" + (d < 10 ? '0' : '') + d;
        }
    </script>

@endsection
