@extends('layouts.app')
@section('title', 'Nuestros Productos')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center mb-0">Carrito de Compras</h2>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if($carrito && count($carrito) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carrito as $item)
                                    <tr>
                                        <td>{{ $item['producto']->nombre }}</td>
                                        <td>{{ $item['cantidad'] }}</td>
                                        <td>{{ number_format($item['precio'], 2) }} €</td>
                                        <td>{{ number_format($item['precio'] * $item['cantidad'], 2) }} €</td>
                                        <td>
                                            <a href="{{ route('pedido.eliminar', $item['producto']->id) }}" class="btn btn-danger">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <h4 class="text-primary">Total: {{ number_format($total, 2) }} €</h4>

                        <form action="{{ route('pedido.realizar') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Realizar Pedido</button>
                        </form>
                    @else
                        <p class="text-muted">Tu carrito está vacío.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
