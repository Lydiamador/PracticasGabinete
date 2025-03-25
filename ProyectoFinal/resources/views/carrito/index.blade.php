@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Carrito de Compras</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carrito as $id => $item)
                <tr>
                    <td>
                        @if(isset($item['producto']) && $item['producto'] instanceof \App\Models\Plato)
                            <img src="{{ asset('storage/' . $item['producto']->imagen) }}" alt="Imagen del Plato" width="50">
                        @elseif(isset($item['producto']) && $item['producto'] instanceof \App\Models\Menu)
                            <img src="{{ asset('storage/menus/menu_del_dia.png') }}" alt="Imagen del Menú" width="50">
                        @else
                            <img src="{{ asset('storage/default-product.png') }}" alt="Producto" width="50">
                        @endif
                    </td>
                    <td>
                        @if(isset($item['producto']) && $item['producto'] instanceof \App\Models\Plato)
                            {{ $item['producto']->nombre }}
                        @elseif(isset($item['producto']) && $item['producto'] instanceof \App\Models\Menu)
                            Menú del día
                        @else
                            Producto no disponible
                        @endif
                    </td>
                    <td>{{ number_format($item['precio'], 2) }}€</td>
                    <td>{{ $item['cantidad'] }}</td>
                    <td>{{ number_format($item['precio'] * $item['cantidad'], 2) }}€</td>
                    <td>
                        <a href="{{ route('pedido.eliminar', $id) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        

        <h3 class="text-right">Total: {{ number_format($total, 2) }}€</h3>
        <a href="{{ route('pedido.realizar') }}" class="btn btn-success">Realizar Pedido</a>
    </div>
</div>
@endsection
