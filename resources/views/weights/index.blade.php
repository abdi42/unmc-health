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
            <canvas id="myChart"></canvas>
        </div>
    </div>
    
    <br>
    <br>
    <table class="table table-hover table-borderless mt-4">
        <thead>
        <tr class="m-3">
            <th class='border-0'>Weight</th>
            <th class='border-0'>Body mass index</th>
            <th class='border-0'>Body Fat</th>
            <th class='border-0'>Measurement Time</th>
            <th class='border-0'>Note</th>
        </tr>
        </thead>
        <tbody id="accordionMedication" class="border bg-white material-card">
        @foreach($data as $i => $item)
            <tr class="border-bottom">
                <th scope="row">
                    {{round($item->WeightValue,1)}}
                </th>
                <td>{{round($item->BMI,1)}}</td>
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
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script !src="">
        function getDate(dateStr) {
            var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
            ];

            var date = new Date(dateStr);
            const hours = ((date.getHours() + 11) % 12 + 1);

            return monthNames[date.getMonth()] + " " + date.getDate() +  " " + "(" + hours + ":" + date.getMinutes() + ")"
        }

        const weightValues = @json($weightValues);

        var dates = @json($dates);


        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Weight Value',
                    data: weightValues,
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
