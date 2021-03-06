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
            <canvas id="myChart"></canvas>
        </div>
    </div>
    
    <br>
    <br>
    <table class="table table-hover table-borderless mt-4">
        <thead>
        <tr>
            <th class='border-0'>Blood Glucose </th>
            <th class='border-0'>Dinner Situation </th>
            <th class='border-0'>DrugSituation </th>
            <th class='border-0'>Measurement Time</th>
            <th class='border-0'>Note</th>
        </tr>
        </thead>
        <tbody id="accordionMedication" class="border bg-white material-card">
        @foreach($data as $i => $item)
            <tr class="border-bottom">
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
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script !src="">
        const values = @json($values);

        var dates = @json($dates);


        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Blood Glucose Value',
                    data: values,
                    backgroundColor: '#f47b77',
                    borderColor: '#f47b77',
                    borderWidth: 2,
                    pointBorderWidth:4,
                    pointBackgroundColor:'rgba(255,99,132,1)',
                    fill: false,
                    lineTension: 0
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endpush
