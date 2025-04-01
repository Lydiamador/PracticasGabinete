@extends('layouts.app')

@section('title', 'Gestión de Platos')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Gestión de Platos</h2>
            <a href="{{ route('platos.create') }}" class="btn btn-light">
                <i class="fas fa-plus"></i> Nuevo Plato
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
                <table id="miTabla" class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($platos as $platoItem)
                        <tr>
                            <td>{{ $platoItem->id }}</td>
                            <td>{{ $platoItem->tipo }}</td>
                            <td>{{ $platoItem->nombre }}</td>
                            <td>{{ number_format($platoItem->precio, 2) }}€</td>
                            <td>
                                <!-- Mostrar imagen o texto alternativo -->
                                @if($platoItem->imagen)
                                    <img src="{{ asset('storage/' . $platoItem->imagen) }}" alt="{{ $platoItem->nombre }}" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <span>Sin imagen</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('platos.edit', $platoItem->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> 
                                </a>
                                <form action="{{ route('platos.destroy', $platoItem->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este plato?')">
                                        <i class="fas fa-trash"></i> 
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

<!-- Modal Nuevo Plato -->
@if(Route::currentRouteName() == 'platos.create')
<div class="modal fade show" id="nuevoPlatoModal" tabindex="-1" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Plato</h5>
                <a href="{{ route('gestion-platos') }}" class="btn-close"></a>
            </div>
            <form action="{{ route('platos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" required>
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
                    <a href="{{ route('gestion-platos') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Crear Plato</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

<!-- Modal Editar Plato -->
@if(Route::currentRouteName() == 'platos.edit')
<div class="modal fade show" id="editarPlatoModal" tabindex="-1" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Plato</h5>
                <a href="{{ route('gestion-platos') }}" class="btn-close"></a>
            </div>
            <form action="{{ route('platos.update', $plato->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" value="{{ old('tipo', $plato->tipo) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $plato->nombre) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{ old('precio', $plato->precio) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen Actual</label>
                        <div>
                            @if($plato->imagen)
                                <img src="{{ asset('storage/' . $plato->imagen) }}" alt="{{ $plato->nombre }}" style="width: 100px; height: 100px; object-fit: cover;">
                            @else
                                <span>Sin imagen</span>
                            @endif
                        </div>
                        <label for="imagen" class="form-label mt-2">Nueva Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('gestion-platos') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Inicializamos DataTables en la tabla con id 'miTabla'
        $('#miTabla').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/Spanish.json" //Plugin para que la datatable sea en español
            },
            "pagingType": "full_numbers"  // Paginación completa
        });
    });
</script>
@endpush
