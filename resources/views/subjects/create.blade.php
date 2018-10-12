@extends('layouts.dashboard')


@section('content')

    <title>Add Subject</title><br>
    <h3 class='sub-header'>Create New Subject</h3>
    <div class="card mt-5">
      <div class="card-body">
        <form action="/subjects" method="post">
            {{ csrf_field() }}
            <p>Enter Subject Code</p>
            <input type="text" name="id" placeholder="Enter your subject code here" class="form-control" required><br>

            <p>Medication Schedule</p>

            <div class="input-group">
                <div class="col-1">
                    <br>
                    <p class="text-center font-weight-bold">1.</p>
                </div>
                <div class="col-6">
                    <label for="medication_name">Medication name</label>
                    <input type="text" name="medication_name" placeholder="Enter medication name here" class="form-control" required>
                </div>
                <div class="col-5">
                    <label for="medication_time">Medication time</label>
                    <input type="time" name="medication_time" placeholder="Enter your Medication time here" class="form-control px-2 py-1"  required>
                </div>
            </div>


            <br><p>Enter your PIN </p>
            <input type="password" name="pin" placeholder="Enter your PIN here" class="form-control" required>

            <br><p>Select Disease(s) that apply</p>
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
      </div>
    </div>

@endsection
