@extends('layouts.app') 

@section('content') 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Gestión de Menús</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMenuModal">
                        Crear Nuevo Menú
                    </button>
                </div> 
                <!-- ENCABEZADO DE LA TARJETA CON TÍTULO Y BOTÓN PARA CREAR UN NUEVO MENÚ -->

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif 
                    <!-- MUESTRA UN MENSAJE DE ÉXITO SI EXISTE EN LA SESIÓN -->

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Imágenes</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($menus as $menu)
                                    <tr>
                                        <td>{{ $menu->id }}</td>
                                        <td>{{ $menu->fecha }}</td>
                                        <td>{{ $menu->descripcion }}</td>
                                        <td>{{ number_format($menu->precio, 2) }}€</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                @if($menu->imagen1)
                                                    <img src="{{ asset('storage/'.$menu->imagen1) }}" alt="Imagen 1" class="img-thumbnail" style="width: 40px; height: 40px; object-fit: cover;">
                                                @endif
                                                @if($menu->imagen2)
                                                    <img src="{{ asset('storage/'.$menu->imagen2) }}" alt="Imagen 2" class="img-thumbnail" style="width: 40px; height: 40px; object-fit: cover;">
                                                @endif
                                                @if($menu->imagen3)
                                                    <img src="{{ asset('storage/'.$menu->imagen3) }}" alt="Imagen 3" class="img-thumbnail" style="width: 40px; height: 40px; object-fit: cover;">
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editMenuModal{{ $menu->id }}">
                                                Editar
                                            </button>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteMenuModal{{ $menu->id }}">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                    <!-- TABLA RESPONSIVA QUE MUESTRA LOS MENÚS CON SUS DATOS (ID, FECHA, DESCRIPCIÓN, PRECIO, IMÁGENES Y ACCIONES) -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA CREAR UN NUEVO MENÚ -->
<div class="modal fade" id="createMenuModal" tabindex="-1" aria-labelledby="createMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createMenuModalLabel">Crear Nuevo Menú</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" required placeholder="Primer Plato:
                                                                                                                Segundo Plato:
                                                                                                                Postre:"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Imágenes del Menú</label>
                        <div class="mb-2">
                            <label for="imagen1" class="form-label">Imagen 1</label>
                            <input type="file" class="form-control" id="imagen1" name="imagen1" accept="image/*">
                        </div>
                        <div class="mb-2">
                            <label for="imagen2" class="form-label">Imagen 2</label>
                            <input type="file" class="form-control" id="imagen2" name="imagen2" accept="image/*">
                        </div>
                        <div class="mb-2">
                            <label for="imagen3" class="form-label">Imagen 3</label>
                            <input type="file" class="form-control" id="imagen3" name="imagen3" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div> 

<!-- MODALES DE EDICIÓN -->
@foreach($menus as $menu)
    <div class="modal fade" id="editMenuModal{{ $menu->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Menú</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.menu.update', ['menu' => $menu->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="fecha{{ $menu->id }}" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha{{ $menu->id }}" name="fecha" value="{{ $menu->fecha }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion{{ $menu->id }}" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion{{ $menu->id }}" name="descripcion" required>{{ 
                                $menu->descripcion ?? "Primer Plato:
                                                       Segundo Plato:
                                                       Postre:" 
                            }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="precio{{ $menu->id }}" class="form-label">Precio</label>
                            <input type="number" step="0.01" class="form-control" id="precio{{ $menu->id }}" name="precio" value="{{ $menu->precio }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Imágenes del Menú</label>
                            <div class="mb-2">
                                <label for="imagen1{{ $menu->id }}" class="form-label">Imagen 1</label>
                                <input type="file" class="form-control" id="imagen1{{ $menu->id }}" name="imagen1" accept="image/*">
                                @if($menu->imagen1)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/'.$menu->imagen1) }}" alt="Imagen actual 1" class="img-thumbnail" style="max-height: 80px; width: auto;">
                                    </div>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label for="imagen2{{ $menu->id }}" class="form-label">Imagen 2</label>
                                <input type="file" class="form-control" id="imagen2{{ $menu->id }}" name="imagen2" accept="image/*">
                                @if($menu->imagen2)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/'.$menu->imagen2) }}" alt="Imagen actual 2" class="img-thumbnail" style="max-height: 80px; width: auto;">
                                    </div>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label for="imagen3{{ $menu->id }}" class="form-label">Imagen 3</label>
                                <input type="file" class="form-control" id="imagen3{{ $menu->id }}" name="imagen3" accept="image/*">
                                @if($menu->imagen3)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/'.$menu->imagen3) }}" alt="Imagen actual 3" class="img-thumbnail" style="max-height: 80px; width: auto;">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 

    <!-- MODAL PARA ELIMINAR UN MENÚ -->
    <div class="modal fade" id="deleteMenuModal{{ $menu->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Está seguro de que desea eliminar este menú?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 
@endforeach

@endsection 
