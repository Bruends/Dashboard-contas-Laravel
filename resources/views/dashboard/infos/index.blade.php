{{-- resources/views/admin/dashboard.blade.php --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Informações</h1>
@stop

@section('content')
  {{-- cards --}}
  <div class="container-fluid">
    <div class="row">

      {{-- total a receber --}}
      <div class="col-md-3 col-sm-6 small-box bg-green">
        <div class="inner">
          <h3>R$ {{ $valuesData[0] }}</h3>          
          <p>Total a receber</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>              
      </div>

      {{-- inadimplências --}}          
      <div class="col-md-3 col-sm-6 small-box bg-red">
        <div class="inner">
          <h3>{{ $countData[0] }}</h3>          
          <p>Numero de Inadimplêntes</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>              
      </div>

      {{-- total pagar --}}
      <div class="col-md-3 col-sm-6 small-box bg-yellow">
        <div class="inner">
          <h3>R$ {{ $valuesData[2] }}</h3>          
          <p>Total a pagar</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>              
      </div>

      {{-- contas atrasadas --}}
      <div class="col-md-3 col-sm-6 small-box bg-red">
        <div class="inner">
          <h3>{{ $countData[1] }}</h3>          
          <p>Numero de contas Atrasadas</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>              
      </div>  
      
    </div>
  </div>  

  @include('dashboard.infos.charts.chart')  

  <script>
    // load charts
    window.onload = function (){
      loadChart("{{ json_encode($valuesData) }}")
    }
  </script>
@stop

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css"> 
@stop

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
  <script src="{{ URL::asset('js/charts.js') }}"></script>
@stop
