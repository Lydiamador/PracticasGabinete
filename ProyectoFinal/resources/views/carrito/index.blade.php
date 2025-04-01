@extends('layouts.app')

@section('title', 'Carrito de Compras')
<link rel="stylesheet" href="{{ asset('css/carro.css') }}">
@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=delete" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=delete" />
<div class="container mt-5">
    <h1 class="text-center mb-4">Carrito de Compras</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        @foreach($carrito as $id => $item)
        <div class="col-12 mb-4">
            <div class="card shadow-sm border-0 rounded-lg p-3">
                <div class="d-flex align-items-center">
                    <div class="col-md-2">
                        <img src="{{ isset($item['producto']) && $item['producto'] instanceof \App\Models\Plato ? asset('storage/' . $item['producto']->imagen) : (isset($item['producto']) && $item['producto'] instanceof \App\Models\Menu ? asset('storage/menus/menu_del_dia.png') : (isset($item['producto']) && $item['producto'] instanceof \App\Models\Producto ? asset('storage/' . $item['producto']->imagen) : asset('storage/default-product.png'))) }}" class="img-fluid rounded" alt="Imagen del Producto" style="height: 100px; object-fit: cover;">
                    </div>
                    <div class="col-md-6 ms-3">
                        <h5 class="text-dark">
                            {{ isset($item['producto']) && $item['producto'] instanceof \App\Models\Plato ? $item['producto']->nombre : (isset($item['producto']) && $item['producto'] instanceof \App\Models\Menu ? 'Menú del día' : (isset($item['producto']) && $item['producto'] instanceof \App\Models\Producto ? $item['producto']->nombre : 'Producto no disponible')) }}
                        </h5>
                        <p class="text-muted mb-1">
                            <strong>Precio:</strong> {{ number_format($item['precio'], 2) }}€<br>
                            <strong>Cantidad:</strong> {{ $item['cantidad'] }}<br>
                            <strong>Total:</strong> {{ number_format($item['precio'] * $item['cantidad'], 2) }}€
                        </p>
                    </div>
                    <div class="col-md-2 text-end">
                        <a href="{{ route('pedido.eliminar', $id) }}" class="material-symbols-outlined" style="background: none; border: none; color:red;">delete</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-right mt-4">
        <h3 class="text-dark"><strong>Total:</strong> {{ number_format($total, 2) }}€</h3>
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary btn-lg mt-3">Pagar</button>
        </form>        
    </div>
</div>

@endsection
