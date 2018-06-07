{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="box">
      <div class="box-header">
      @include('includes.alerts')
      <br>
      <a href="{{ route('payables') }}" class="btn btn-info">
          voltar
          <i class="fa fa-arrow-left"></i>
      </a>
      </div>
      <div class="box-body">
          <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Cadastrar Novo Pagamento</h3>
              </div>
              <div class="box-body">
              <form action="{{ route('payables.store') }}" method="POST" class="form">
                {{ csrf_field() }}
                  {{-- cliente --}}
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-bill"></i> Título *</span>
                      <input class="form-control" name="title" placeholder="Título" type="text">
                    </div>
                    <br>
                    {{-- valor --}}
                    <div class="input-group">
                      <span class="input-group-addon">Valor em R$ *</span>
                      <input class="form-control" name="value" placeholder="Valor" type="number">
                    </div>
                    <br>
                    {{-- check boxes --}}
                    <div class="form-row">
                      <div class="form-check">
                          <input class="form-check-input" name="payed" type="checkbox">
                          <label class="form-check-label">Marcar como Pago</label>
                      </div>
                    </div>
                    {{-- vencimento --}}
                    <div class="input-group">
                      <br>
                      <label class="form-check-label">Data de vencimento</label> 
                      <input class="form-control" name="expiration_date" placeholder="Valor" type="date">
                    </div> 
                    <br>
                    <small>itens marcados com * são obrigatórios</small><br>
                    <button class="btn btn-success"> Adicionar </button>
              </form>
        </div>
      </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
