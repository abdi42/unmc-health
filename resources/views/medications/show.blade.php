@extends('layouts.master')

@section('content')

    @for($i=0;$i<count($medications);$i++)

        <p><b>Subject ID: </b> {{ $medications[$i]['subject'] }}</p>

        <p><br><b>Medication Name:</b></p> <ul> {{ $medications[$i]['medication_name1'] }}</ul>
        <ul> {{ $medications[$i]['medication_name2'] }}</ul>
        <ul> {{ $medications[$i]['medication_name3'] }}</ul>

        <p><br><b>Medication Time: </b>   {{ $medications[$i]['medication_time'] }}</p><br>

        <p><b>Medication Days: </b></p>     {{ $medications[$i]['medication_days'] }}

        <p><br><b>Created On: </b>   {{ $medications[$i]['created_at'] }}</p>

        <a href="{{'/medications/'.$medications[$i]['id'].'/edit'}}"><button class="btn btn-primary">Edit</button></a><br><br>

        <a href="{{'/actionplans/'.$medications[$i]['id'].'/delete'}}"><button class="btn btn-primary">Delete</button></a>
        <hr>

    @endfor

@endsection