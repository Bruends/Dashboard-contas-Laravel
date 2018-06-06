{{-- resources/views/admin/dashboard.blade.php --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Gerenciar Pagamentos</h1>
@stop

@section('content')
    <div class="box">
      {{-- box header --}}
      <div class="box-header">
        {{-- alertas --}}
        @include('includes.alerts')
        
        {{-- btn adicionar --}}
        <a href="{{ route('payables.addPage') }}" class="btn btn-success">
            Novo Pagamento &nbsp;
            <i class="fa fa-plus"></i>
        </a>
      </div>
       
      {{-- box body --}}
      <div class="box-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>id</th>
              <th>Título</th>
              <th>Valor R$</th>
              <th>Vencimento</th>
              <th>Pago</th>              
            </tr>
          </thead>
          <tbody>
            @foreach($payables as $payable)
              <tr>
                <td>{{ $payable['id'] }}</td>
                <td>{{ $payable['title'] }}</td>
                <td>{{ number_format($payable['value'], 2) }}</td>
                <td>{{ $payable['expiration_date'] }}</td>
                <td>{{ $payable['payed'] ? 'sim' : 'não' }}</td>                
                <td>
                  {{-- botão editar --}}
                  <a href="{{ url('pagamentos/'.$payable['id'].'/alterar') }}" class="btn btn-warning">
                    <i class="fa fa-pencil"></i>
                  </a>&nbsp;
                  {{-- botão apagar --}}
                  <a href="{{ url('pagamentos/'.$payable['id'].'/deletar') }}" class="btn btn-danger">
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
