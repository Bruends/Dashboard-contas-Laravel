{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="box">
      <div class="box-header">
      <a href="{{ route('receivables.add') }}" class="btn btn-success">
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
              <th>inadimplência</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($receivables as $receivable)
              <tr>
                <td>{{ $receivable['id'] }}</td>
                <td>{{ $receivable['client'] }}</td>
                <td>{{ $receivable['value'] }}</td>
                <td>{{ $receivable['expiration_date'] }}</td>              
                <td>{{ $receivable['payed'] ? 'sim' : 'não' }}</td>
                <td>{{ $receivable['non-payment'] ? 'sim' : 'não'  }}</td>              
                <td>
                  <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
