@extends('layouts.app')

@section('title', 'Gestión de Productos')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Gestión de Productos</h2>
            <a href="{{ route('productos.create') }}" class="btn btn-light">
                <i class="fas fa-plus"></i> Nuevo Producto
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Categoría</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $productoItem)
                        <tr>
                            <td>{{ $productoItem->id }}</td>
                            <td>{{ $productoItem->categoria }}</td>
                            <td>{{ $productoItem->nombre }}</td>
                            <td>{{ number_format($productoItem->precio, 2) }}€</td>
                            <td>
                                <!-- Mostrar imagen o texto alternativo -->
                                @if($productoItem->imagen)
                                    <img src="{{ asset('storage/' . $productoItem->imagen) }}" alt="{{ $productoItem->nombre }}" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <span>Sin imagen</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('productos.edit', $productoItem->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('productos.destroy', $productoItem->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Nuevo Producto -->
@if(Route::currentRouteName() == 'productos.create')
<div class="modal fade show" id="nuevoProductoModal" tabindex="-1" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Producto</h5>
                <a href="{{ route('gestion-productos') }}" class="btn-close"></a>
            </div>
            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <input type="text" class="form-control" id="categoria" name="categoria" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('gestion-productos') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Crear Producto</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

<!-- Modal Editar Producto -->
@if(Route::currentRouteName() == 'productos.edit')
<div class="modal fade show" id="editarProductoModal" tabindex="-1" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Producto</h5>
                <a href="{{ route('gestion-productos') }}" class="btn-close"></a>
            </div>
            <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <input type="text" class="form-control" id="categoria" name="categoria" value="{{ old('categoria', $producto->categoria) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen Actual</label>
                        <div>
                            @if($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" style="width: 100px; height: 100px; object-fit: cover;">
                            @else
                                <span>Sin imagen</span>
                            @endif
                        </div>
                        <label for="imagen" class="form-label mt-2">Nueva Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('gestion-productos') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection