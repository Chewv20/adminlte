@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Graficas</h1>
@stop

@section('content')

<div class="row col-6">
    <canvas id="myChart"></canvas>
</div>
@stop


@section('js')
  
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

  
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

  
  </script>
@stop