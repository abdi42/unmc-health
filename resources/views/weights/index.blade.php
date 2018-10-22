@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    $subjectId => '/subjects/' . $subjectId,
    'Weights' => null
  ]
])

@section('content')
    <br>
    <br>
    <title>Weights</title>

    <h3 class='sub-header'>{{'Subject ' . $subjectId . ' Weight'}}</h3>
    <br>
    <br>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover mt-4">
                <thead>
                <tr>
                    <th class='border-0'>Weight</th>
                    <th class='border-0'>Body mass index</th>
                    <th class='border-0'>Body Fat</th>
                    <th class='border-0'>Measurement Time</th>
                    <th class='border-0'>Note</th>
                </tr>
                </thead>
                <tbody id="accordionMedication">
                @foreach($results->WeightDataList as $i => $item)
                    <tr>
                        <th scope="row">
                            {{round($item->WeightValue,1)}}
                        </th>
                        <td>{{$item->BMI}}</td>
                        <td>
                            {{$item->FatValue}}
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
