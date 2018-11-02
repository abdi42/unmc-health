@extends('layouts.dashboard')

@section('content')
    <title>Edit Subject</title>




    <br><h1>Edit Subject</h1><br>


    <form action="/subject/{{$subject->subject}}" method="post">


        {{ csrf_field() }}

        {{method_field('PUT')}}


        <p>Enter Subject Code</p>
        <input type="text" name="id" placeholder="Enter your subject code here" class="form-control" value="{{ $subject->subject }}" required><br>

        <p>Enter your PIN </p>
        <input type="password" name="pin" placeholder="Enter your PIN here" class="form-control" value="{{ $subject->pin }}"required>

        <br>    <p>Enter the iHealth User ID </p>
        <input type="text" name="userid" placeholder="Enter your iHealth userid here" class="form-control" value="{{ $subject->userid }}">

        <br><p>Search iHealth User ID here</p>
       <input type="button" name="iHealth ID"  value="Search iHealth ID" class="btn btn-primary"  onclick="window.location='{{ url("/subjects/ihealth") }}'" /> <br>



        <br>  <p>Select Disease(s) that apply</p>
        <input type="checkbox" name="disease[]"  value="HeartFailure" checked="checked"> Heart Failure &nbsp;
        <input type="checkbox" name="disease[]"  value="HyperTension"> Hyper Tension &nbsp;
        <input type="checkbox" name="disease[]"  value="COPD"> COPD &nbsp;
        <input type="checkbox" name="disease[]"  value="Diabetes"> Diabetes &nbsp;<br>

        <br> <p>Select the intervention group for this subject:</p>
        <select name="group_type" id="group_type" class="form-control" required>
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

        <br> <p>Virtual Visits</p>
        <input type="radio" name="virtualvisit"  value=1 checked="checked"> Yes &nbsp;
        <input type="radio" name="virtualvisit"  value=0> No &nbsp;<br>

        <br> <p>Enrollment Start Date</p>
        <input type="date" name="enrollmentdate" id="enrollmentdate" class="form-control col-sm-2" value="{{ $subject->enrollmentdate }}" required><br>


        <br> <p>Enrollment End Date</p>
        <input type="date" name="enrollment_end_date" id="enrollment_end_date" class="form-control col-sm-2" value="{{ $subject->enrollment_end_date }}" required>
        <a href="javascript:auto_calculate_enrollment_end_date()" >Click here to auto-calculate +90 days from enrollment</a>
        <br>
        <div class="form-notes">
            <em>This date is used to block subject access to the app.</em>
        </div>



        <br> <button type="submit" class="btn btn-primary">Update</button> &nbsp;
        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/subjects") }}'" />

    </form>

    <script>
        var days = '{{\App\Subject::ENROLLMENT_LENGTH_DEFAULT_DAYS}}';
        function auto_calculate_enrollment_end_date() {
            var e = document.getElementById('enrollmentdate');
            var f = document.getElementById('enrollment_end_date');
            var d = new Date(e.value);
            d.setDate(d.getDate() + parseInt(days));
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
