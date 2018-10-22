@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    $subjectId => '/subjects/' . $subjectId,
    'Blood Glucose' => null
  ]
])

@section('content')
    <br>
    <br>
    <title>Weights</title>

    <h3 class='sub-header'>{{'Subject ' . $subjectId . ' Blood Glucose'}}</h3>
    <br>
    <br>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover mt-4">
                <thead>
                <tr>
                    <th class='border-0'>Blood Glucose </th>
                    <th class='border-0'>Dinner Situation </th>
                    <th class='border-0'>DrugSituation </th>
                    <th class='border-0'>Measurement Time</th>
                    <th class='border-0'>Note</th>
                </tr>
                </thead>
                <tbody id="accordionMedication">
                @foreach($results->BGDataList as $i => $item)
                    <tr>
                        <th scope="row">
                            {{$item->BG}}
                        </th>
                        <td>{{str_replace("_"," ",$item->DinnerSituation) }}</td>
                        <td>
                            {{str_replace("_"," ",$item->DrugSituation) }}
                        </td>
                        <td>
                            {{\Carbon\Carbon::parse($item->measurement_time,'UTC')->format('M d,  h:m a')}}
                        </td>
                        <td>{{$item->Note}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
