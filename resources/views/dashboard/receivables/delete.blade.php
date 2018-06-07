{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="box">
      <div class="box-header">
      @include('includes.alerts')
      <br>
      <a href="{{ route('receivables') }}" class="btn btn-info">
          voltar
          <i class="fa fa-arrow-left"></i>
      </a>
      </div>
      <div class="box-body">
          <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Apagar recebimento ?</h3>
              </div>
              <div class="box-body">
              <form action="{{ route('receivables.delete') }}" method="POST" class="form">
                {{ csrf_field() }}
                  {{-- cliente --}}
                  <div class="small-box bg-red">
                      <div class="inner">
                        <h1 class="h2">Cliente: {{ $receivable['client'] }}</h1>
          
                        <p>Valor: {{ $receivable['value'] }}</p>
                        <p>Data vencimento: {{ $receivable['expiration_date'] }}</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-trash"></i>
                      </div>
                      
                    </div>
                  <input type="hidden" value="{{ $receivable['id'] }}" name="id">
                    <button class="btn btn-danger"> Deletar </button>
              </form>
        </div>
      </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
