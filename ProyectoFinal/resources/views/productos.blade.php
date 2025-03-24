@extends('layouts.app')

@section('title', 'Nuestros Productos')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Nuestros Productos</h1>

    <!-- Tabs para categorías -->
    <ul class="nav nav-tabs mb-4" id="productTabs" role="tablist">
        @foreach($productos->keys() as $categoria)
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $loop->first ? 'active' : '' }}" 
                        id="{{ Str::slug($categoria) }}-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#{{ Str::slug($categoria) }}"
                        type="button"
                        role="tab"
                        aria-controls="{{ Str::slug($categoria) }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                    {{ ucfirst($categoria) }}
                </button>
            </li>
        @endforeach
    </ul>

    <!-- Contenido de las tabs -->
    <div class="tab-content" id="productTabsContent">
        @foreach($productos as $categoria => $items) 
    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ Str::slug($categoria) }}" role="tabpanel" aria-labelledby="{{ Str::slug($categoria) }}-tab">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($items as $producto)
                <div class="col">
                    <div class="card h-100 border shadow-sm">
                        <!-- Imagen del producto -->
                        <div class="card-img-top overflow-hidden" style="height: 250px; object-fit: cover;">
                            @if($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-100 h-100" style="object-fit: cover;">
                            @else
                                <img src="{{ asset('img/default-product.jpg') }}" alt="Producto sin imagen" class="w-100 h-100" style="object-fit: cover;">
                            @endif
                        </div>

                        <!-- Detalles del producto -->
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($producto->descripcion ?? 'Sin descripción', 50) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">{{ $producto->categoria }}</span>
                                <span class="fs-5 fw-bold text-primary">{{ number_format($producto->precio, 2) }}€</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach
    </div>
</div>
@endsection