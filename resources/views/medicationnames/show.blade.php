@extends('layouts.master')

@section('content')

 @for($i=0;$i<count($medicationnames);$i++)
     <br><p>Subject ID:</p> {{ $medicationnames['medicationslot']['subject'] }}<br>

     <br><p>Medication Name</p> {{ $medicationnames['medication_name'] }}<br>

     <br> <p>Medication Slot</p> {{ $medicationnames['medicationslot']['medication_time'] }}<br>

    @endfor

@endsection