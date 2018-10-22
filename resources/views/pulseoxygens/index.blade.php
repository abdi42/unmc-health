@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    $subjectId => '/subjects/' . $subjectId,
    'Pulse Oxygens' => null
  ]
])

@section('content')
    <br>
    <br>
    <title>Pulse Oxygens</title>

    <h3 class='sub-header'>{{'Subject ' . strtoupper($subjectId) . ' Pulse Oxygens'}}</h3>
    <br>
    <br>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover mt-4">
                <thead>
                <tr>
                    <th class='border-0'>Blood Oxygen</th>
                    <th class='border-0'>Pulse (Beats/Min)</th>
                    <th class='border-0'>Measurement Time</th>
                    <th class='border-0'>Note</th>
                </tr>
                </thead>
                <tbody id="accordionMedication">
                @foreach($results->BODataList as $i => $item)
                    <tr>
                        <th scope="row">
                            {{$item->BO}}
                        </th>
                        <td>{{$item->HR}}</td>
                        <td>
                            {{\Carbon\Carbon::parse($item->measurement_time,'UTC')->format('M d,  h:m a')}}
                        </td>
                        <td>
                            {{$item->Note}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
