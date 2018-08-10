@extends('layouts.master')


@section('content')

    <br><title>Add Subject</title>
    <h1>Add a Subject</h1><br>

    <form action="/subjects" method="post">
        {{ csrf_field() }}
        <p>Enter Subject Code</p>
        <input type="text" name="id" placeholder="Enter your subject code here" class="form-control" required>


        <br>    <p>Enter your PIN </p>
        <input type="password" name="pin" placeholder="Enter your PIN here" class="form-control" required>

        <br>  <p>Select Disease(s) that apply</p>
        <input type="checkbox" name="disease[]"  value="HeartFailure" checked="checked"> Heart Failure &nbsp;
        <input type="checkbox" name="disease[]"  value="HyperTension"> Hyper Tension &nbsp;
        <input type="checkbox" name="disease[]"  value="COPD"> COPD &nbsp;
        <input type="checkbox" name="disease[]"  value="Diabetes"> Diabetes &nbsp;<br>



        <br> <p>Virtual Visits</p>
        <input type="radio" name="virtualvisit"  value=1 checked="checked"> Yes &nbsp;
        <input type="radio" name="virtualvisit"  value=0> No &nbsp;<br>

        <br> <p>Enrollment Start Date</p>
        <input type="date" name="enrollmentdate" value="date" required><br>



        <br>   <button type="submit" class="btn btn-primary">Save</button>


    </form>

@endsection