@extends('layouts.app')

@section('title', 'Nuestros Platos')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Nuestros Platos</h1>
    
    <!-- TABS PARA TIPOS DE PLATOS -->
    <ul class="nav nav-tabs mb-4" id="platosTabs" role="tablist">
        @foreach($platos->keys() as $tipo)
            @php
                $slugTipo = Str::slug($tipo); // Crear un slug para evitar repetir la función varias veces
            @endphp
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $loop->first ? 'active' : '' }}" 
                        id="{{ $slugTipo }}-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#{{ $slugTipo }}"
                        type="button"
                        role="tab"
                        aria-controls="{{ $slugTipo }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                    {{ ucfirst($tipo) }}
                </button>
            </li>
        @endforeach
    </ul>

    <!-- CONTENIDO DE LAS TABS -->
    <div class="tab-content" id="platosTabsContent">
        @foreach($platos as $tipo => $platosPorTipo)
            @php
                $slugTipo = Str::slug($tipo); // Crear un slug para evitar repetir la función varias veces
            @endphp
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $slugTipo }}" role="tabpanel" aria-labelledby="{{ $slugTipo }}-tab">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($platosPorTipo as $plato)
                        <div class="col">
                            <div class="card h-100 border shadow-sm">
                                <!-- Imagen del plato -->
                                <div class="card-img-top overflow-hidden" style="height: 250px; object-fit: cover;">
                                    @if($plato->imagen)
                                        <img src="{{ asset('storage/' . $plato->imagen) }}" alt="{{ $plato->nombre }}" class="w-100 h-100" style="object-fit: cover;">
                                    @else
                                        <img src="{{ asset('img/default-plato.jpg') }}" alt="Plato sin imagen" class="w-100 h-100" style="object-fit: cover;">
                                    @endif
                                </div>

                                <!-- Detalles del plato -->
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h5 class="card-title">{{$plato->nombre}}</h5>
                                    <p class="card-text text-muted">{{ Str::limit($plato->descripcion ?: 'Sin descripción', 100) }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge bg-primary">{{ $plato->tipo }}</span>
                                        <span class="fs-5 fw-bold text-primary">{{ number_format($plato->precio, 2) }}€</span>
                                    </div>
                                    <a href="{{ route('pedido.agregar', ['id' => $plato->id, 'tipo' => 'plato']) }}" class="btn btn-primary">Agregar al Carrito</a>
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
