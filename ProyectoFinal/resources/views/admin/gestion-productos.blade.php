@extends('layouts.app')
@section('title', 'Gestión de Productos')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Gestión de Productos</h2>
            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#nuevoProductoModal">
                <i class="fas fa-plus"></i> Nuevo Producto
            </button>
        </div>
        <div class="card-body">
            <div id="alertMessage" style="display: none;" class="alert" role="alert"></div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Categoría</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->categoria }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ number_format($producto->precio, 2) }}€</td>
                            <td>
                                <button class="btn btn-sm btn-warning editar-producto" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editarProductoModal"
                                        data-id="{{ $producto->id }}"
                                        data-categoria="{{ $producto->categoria }}"
                                        data-nombre="{{ $producto->nombre }}"
                                        data-precio="{{ $producto->precio }}">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                                <button class="btn btn-sm btn-danger eliminar-producto" 
                                        data-id="{{ $producto->id }}"
                                        data-nombre="{{ $producto->nombre }}">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Producto -->
<div class="modal fade" id="editarProductoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="formEditarProducto">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="editId">
                    <div class="mb-3">
                        <label for="editCategoria" class="form-label">Categoría</label>
                        <input type="text" class="form-control" id="editCategoria" name="categoria" required>
                    </div>
                    <div class="mb-3">
                        <label for="editNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="editNombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="editPrecio" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="editPrecio" name="precio" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Nuevo Producto -->
<div class="modal fade" id="nuevoProductoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="formNuevoProducto">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Crear Producto</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const alertMessage = document.getElementById('alertMessage');

    function showAlert(message, type) {
        alertMessage.textContent = message;
        alertMessage.className = `alert alert-${type}`;
        alertMessage.style.display = 'block';
        setTimeout(() => {
            alertMessage.style.display = 'none';
        }, 3000);
    }

    // Editar Producto
    document.querySelectorAll('.editar-producto').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.dataset.id;
            document.getElementById('editId').value = id;
            document.getElementById('editCategoria').value = this.dataset.categoria;
            document.getElementById('editNombre').value = this.dataset.nombre;
            document.getElementById('editPrecio').value = this.dataset.precio;
        });
    });

    // Eliminar Producto
    document.querySelectorAll('.eliminar-producto').forEach(button => {
        button.addEventListener('click', async function() {
            const id = this.dataset.id;
            const nombre = this.dataset.nombre;
            
            if (confirm(`¿Estás seguro de que deseas eliminar el producto "${nombre}"?`)) {
                try {
                    const response = await fetch(`/productos/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    });
                    
                    if (response.ok) {
                        showAlert('Producto eliminado con éxito', 'success');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        showAlert('Error al eliminar el producto', 'danger');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    showAlert('Error al eliminar el producto', 'danger');
                }
            }
        });
    });

    // Nuevo Producto
    document.getElementById('formNuevoProducto').addEventListener('submit', async function(e) {
        e.preventDefault();
        try {
            const response = await fetch('/productos', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    categoria: document.getElementById('categoria').value,
                    nombre: document.getElementById('nombre').value,
                    precio: document.getElementById('precio').value
                })
            });
            
            if (response.ok) {
                showAlert('Producto creado con éxito', 'success');
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else {
                showAlert('Error al crear el producto', 'danger');
            }
        } catch (error) {
            console.error('Error:', error);
            showAlert('Error al crear el producto', 'danger');
        }
    });

    // Editar Producto Submit
    document.getElementById('formEditarProducto').addEventListener('submit', async function(e) {
        e.preventDefault();
        const id = document.getElementById('editId').value;
        
        try {
            const response = await fetch(`/productos/${id}`, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    categoria: document.getElementById('editCategoria').value,
                    nombre: document.getElementById('editNombre').value,
                    precio: document.getElementById('editPrecio').value
                })
            });
            
            if (response.ok) {
                showAlert('Producto actualizado con éxito', 'success');
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else {
                showAlert('Error al actualizar el producto', 'danger');
            }
        } catch (error) {
            console.error('Error:', error);
            showAlert('Error al actualizar el producto', 'danger');
        }
    });
});
</script>
@endpush
