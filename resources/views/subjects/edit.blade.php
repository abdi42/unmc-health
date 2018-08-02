@extends('layouts.master')

@section('content')
    <title>Edit Subject</title>




    <br><h1>Edit Subject</h1><br>


    <form action="/subject/{{$subject->subject}}" method="post">


        {{ csrf_field() }}

        {{method_field('PUT')}}


        <p>Enter Subject ID</p>
        <input type="text" name="id" placeholder="Enter your subject ID here" class="form-control" value="{{ $subject->subject }}" required><br>

        <p>Enter your PIN </p>
        <input type="password" name="pin" placeholder="Enter your PIN here" class="form-control" value="{{ $subject->pin }}"required>

        <br>    <p>Enter the iHealth User ID </p>
        <input type="text" name="userid" placeholder="Enter your iHealth userid here" class="form-control">

        <br><p>Search iHealth User ID here</p>
        <input type="button" name="iHealth ID" value="Search iHealth ID" class="btn btn-primary"onclick="window.location='{{ url("/subjects/ihealth") }}'" /><br>

        <br>  <p>Select Disease(s) that apply</p>
        <input type="checkbox" name="disease[]"  value="HeartFailure"> Heart Failure &nbsp;
        <input type="checkbox" name="disease[]"  value="HyperTension"> Hyper Tension &nbsp;
        <input type="checkbox" name="disease[]"  value="COPD"> COPD &nbsp;
        <input type="checkbox" name="disease[]"  value="Diabetes"> Diabetes &nbsp;<br>



        <br> <p>Virtual Visits</p>
        <input type="checkbox" name="virtualvisit"  value=1> Yes &nbsp;
        <input type="checkbox" name="virtualvisit"  value=0> No &nbsp;<br>

        <br> <p>Enrollment Start Date</p>
        <input type="date" name="enrollmentdate" value="{{ $subject->enrollmentdate }}" required><br>





        <br> <button type="submit" class="btn btn-primary">Update</button> &nbsp;
        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/subjects") }}'" />

    </form>

@endsection
