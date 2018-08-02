@extends('layouts.master')


@section('content')

    <br><title>Add Subject</title>
    <h1>Add a Subject</h1><br>
    <form action="/subjects" method="post">
        {{ csrf_field() }}
        <p>Enter Subject ID</p>
        <input type="text" name="id" placeholder="Enter your subject ID here" class="form-control" required>


        <br>    <p>Enter your PIN </p>
        <input type="text" name="pin" placeholder="Enter your PIN here" class="form-control" required>

        <br>  <p>Select Disease(s) that apply</p>
        <input type="checkbox" name="disease[]"  value="HeartFailure"> Heart Failure &nbsp;
        <input type="checkbox" name="disease[]"  value="HyperTension"> Hyper Tension &nbsp;
        <input type="checkbox" name="disease[]"  value="COPD"> COPD &nbsp;
        <input type="checkbox" name="disease[]"  value="Diabetes"> Diabetes &nbsp;<br>



        <br> <p>Virtual Visits</p>
        <input type="checkbox" name="virtualvisit"  value=1> Yes &nbsp;
        <input type="checkbox" name="virtualvisit"  value=0> No &nbsp;<br>

        <br> <p>Enrollment Start Date</p>
        <input type="date" name="enrollmentdate" value="date" required><br>



        <br>   <button type="submit" class="btn btn-primary">Save</button>


    </form>

@endsection