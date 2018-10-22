@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    $subjectId => '/subjects/' . $subjectId,
    'Blood Pressures' => null
  ]
])

@section('content')
    <br>
    <br>
    <title>Blood Pressures</title>

    <h3 class='sub-header'>{{'Subject ' . $subjectId . ' Blood Pressures'}}</h3>
    <br>
    <br>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover mt-4">
                <thead>
                <tr>
                    <th class='border-0'>Heart Rate</th>
                    <th class='border-0'>Systolic Blood Pressure</th>
                    <th class='border-0'>Diastolic blood pressure</th>
                    <th class='border-0'>Measurement Time</th>
                    <th class='border-0'>Note</th>
                </tr>
                </thead>
                <tbody id="accordionMedication">
                @foreach($results->BPDataList as $i => $item)
                    <tr>
                        <th scope="row">
                            {{$item->HR}}
                        </th>
                        <td>{{$item->HP}}</td>
                        <td>
                            {{$item->LP}}
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
