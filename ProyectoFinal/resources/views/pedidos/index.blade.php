@extends('layouts.app')

@section('title', 'Historial de Pedidos')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Historial de Pedidos</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row" >
        @foreach($pedidos as $pedido)
        <div class="col-12 mb-4">
            <div class="card shadow-sm border-0 rounded-lg p-3" style="background-color: #c3dfb9;">
                <div class="d-flex justify-content-between align-items-center" style="background-color: #c3dfb9;">
                    <div>
                        <h5 class="text-dark mb-2">Pedido #{{ $pedido->id }}</h5>
                        <p class="text-muted mb-1">
                            <strong>Fecha:</strong> {{ date('d/m/Y H:i', strtotime($pedido->fecha)) }}<br>
                            <strong>Usuario:</strong> {{ $pedido->usuario->nombre }}<br>
                            <strong>Total:</strong> {{ number_format($pedido->total, 2) }}€
                        </p>
                    </div>
                    <div class="text-end">
                        <h6 class="text-dark mb-0">{{ $pedido->nombre }}</h6>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
