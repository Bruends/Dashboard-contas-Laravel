{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Gerenciar Recebimentos</h1>
@stop

@section('content')
    <div class="box">
      {{-- box header --}}
      <div class="box-header">
        {{-- alertas --}}
        @include('includes.alerts')
        
        {{-- btn adicionar --}}
        <a href="{{ route('receivables.addPage') }}" class="btn btn-success">
            Novo Recebimento &nbsp;
            <i class="fa fa-plus"></i>
        </a>
      </div>    
       
      {{-- box body --}}
      <div class="box-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>id</th>
              <th>Cliente</th>
              <th>Valor R$</th>
              <th>Vencimento</th>
              <th>Pago</th>              
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
                <td>
                  {{-- botão editar --}}
                  <a href="{{ url('recebimentos/'.$receivable['id'].'/alterar') }}" class="btn btn-warning">
                    <i class="fa fa-pencil"></i>
                  </a>&nbsp;
                  {{-- botão apagar --}}
                  <a href="{{ url('recebimentos/'.$receivable['id'].'/deletar') }}" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                  </a>
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
