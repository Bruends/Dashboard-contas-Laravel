{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="box">
      <div class="box-header">
      @include('includes.alerts')
        
      <a href="{{ route('receivables.addPage') }}" class="btn btn-success">
          Novo Recebimento &nbsp;
          <i class="fa fa-plus"></i>
      </a>
      </div>
      <div class="box-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Cod</th>
              <th>Cliente</th>
              <th>Valor R$</th>
              <th>Vencimento</th>
              <th>Pago</th>
              <th>inadimplênte</th>
            </tr>
          </thead>
          <tbody>
            @foreach($receivables as $receivable)
              <tr>
                <td>{{ $receivable['id'] }}</td>
                <td>{{ $receivable['client'] }}</td>
                <td>{{ number_format($receivable['value'], 2) }}</td>
                <td>{{ $receivable['expiration_date'] }}</td>              
                <td>{{ $receivable['payed'] ? 'sim' : 'não' }}</td>
                <td>{{ $receivable['non-payment'] ? 'sim' : 'não'  }}</td>              
                <td>
                <a href="{{ url('recebimentos/'.$receivable['id'].'/alterar') }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>&nbsp;
                <a href="{{ url('recebimentos/'.$receivable['id'].'/deletar') }}" class="btn btn-danger"><i class="fa fa-trash"></i></a> 
                </td>
              <tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
