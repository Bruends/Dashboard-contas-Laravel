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
                <h3 class="box-title">Alterar  Recebimento</h3>
              </div>
              <div class="box-body">
              <form action="{{ route('payables.update') }}" method="POST" class="form">
                {{ csrf_field() }}
                  {{-- cliente --}}
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i> Cliente *</span>
                  <input class="form-control" name="title" placeholder="Nome do Cliente" type="text" value="{{ $payable->title }}">
                    </div>
                    <br>  
                    {{-- valor --}}
                    <div class="input-group">
                      <span class="input-group-addon">Valor em R$ *</span>
                      <input class="form-control" name="value" placeholder="Valor" type="number" value="{{ $payable->value }}">
                    </div>
                    <br>
                    {{-- check boxes --}}
                    <div class="form-row">
                      <div class="form-check">
                        @if($payable->payed)
                          <input class="form-check-input" name="payed" type="checkbox" checked/>
                        @else
                          <input class="form-check-input" name="payed" type="checkbox"/>
                        @endif

                      <label class="form-check-label">Marcar como Pago</label>
                          
                      </div>
                    </div>
                    {{-- vencimento --}}
                    <div class="input-group">                      
                      <br>
                      <label class="form-label">Data de vencimento</label> 
                      <input class="form-control" name="expiration_date" type="date">
                    </div> 
                    <small>data de vencimento: {{ $payable->expiration_date }}
                    deixe em branco para não alterar</small><br>
                    <br>
                    <small>itens marcados com * são obrigatórios</small><br>
                    <input type="hidden" value="{{ $payable['id'] }}" name="id">
                    <button class="btn btn-success"> Atualizar </button>
              </form>
        </div>
      </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
