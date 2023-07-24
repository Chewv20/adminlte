@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Graficas</h1>
@stop

@section('content')

<div class="row col-6">
  <canvas id="myChart"></canvas>
</div>
<div class="row col-6">
  <canvas id="myChart1"></canvas>
</div>
<div class="row">
  <canvas id="myChart2"></canvas>
</div>
<div class="row">
  <canvas id="myChart3"></canvas>
</div>
    

@stop


@section('js') 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

  var nombres = [];
  var categoria = [];


  $(document).ready(function(){
  //   $.ajax({
  //     type: "POST",
  //     url: '/games/get',
  //     data:{
  //       id = 1
  //     }
  //   }).done(function(data){
  //     alert(data);
  //   });
  $.ajax({
    url: "{{ route('data') }}",
  }).done(function(data){
    nombres=data.label
    categoria=data.data
    generarGrafica();
    generarGrafica1();
    generarGrafica2();
    generarGrafica3();
  });
  });

  function generarGrafica(){
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: nombres,
        
        datasets: [{
          label: 'Categoria',
          data: categoria,
          borderWidth: 1,
          backgroundColor: [
            'rgb(102, 0, 0)',
            'rgb(255, 0, 0)',
            'rgb(50, 0, 0)',
            'rgb(151, 0, 0)',
          ],
        }]
      },
      options: {
        indexAxis:'x',
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  }
  function generarGrafica1(){
    const ctx = document.getElementById('myChart1');

    new Chart(ctx, {
      type: 'pie',
      data: {
        labels: nombres,
        
        datasets: [{
          label: 'Categoria',
          data: categoria,
          borderWidth: 1,
          backgroundColor: [
            'rgb(102, 0, 0)',
            'rgb(255, 0, 0)',
            'rgb(50, 0, 0)',
            'rgb(151, 0, 0)',
          ],
        }]
      },

    });
  }
  function generarGrafica2(){
    const ctx = document.getElementById('myChart2');

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: nombres,
        
        datasets: [{
          label: 'Categoria',
          data: categoria,
          fill: {
                target: 'origin',
                above: 'rgb(0, 0, 255)',   // Area will be red above the origin
                below: 'rgb(0, 0, 255)'    // And blue below the origin
              } ,
          borderColor: 'rgb(0, 0, 255)',
        }]
      },
      options : {
        scales: {
        y: {
          beginAtZero: true
        }
      }
    }

    });
  }
  function generarGrafica3(){
    const ctx = document.getElementById('myChart3');

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: nombres,
        
        datasets: [{
          label: 'Categoria',
          data: categoria,
          borderColor: 'rgb(0, 0, 255)',
        }]
      },
      options : {
        scales: {
        y: {
          beginAtZero: true
        }
      }
    }

    });
  }
  </script>
@stop