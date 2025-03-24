@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center mb-0">Menú del Día</h2>
                    <p class="text-center mb-0">{{ $fechaActual }}</p>

                </div>
                <div class="card-body">
                    @if($menu)
                        <div class="text-center">
                            <h3 class="mb-4"><I><u>MENÚ DEL DÍA</u></I></h3>
                            
                            <!-- Carrusel de imágenes -->
                            <div id="menuCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @if($menu->imagen1)
                                        <div class="carousel-item active">
                                            <img src="{{ asset('storage/'.$menu->imagen1) }}" class="d-block w-100 menu-image" alt="Plato 1" style="">
                                        </div>
                                    @endif
                                    @if($menu->imagen2)
                                        <div class="carousel-item">
                                            <img src="{{ asset('storage/'.$menu->imagen2) }}" class="d-block w-100 menu-image" alt="Plato 2">
                                        </div>
                                    @endif
                                    @if($menu->imagen3)
                                        <div class="carousel-item">
                                            <img src="{{ asset('storage/'.$menu->imagen3) }}" class="d-block w-100 menu-image" alt="Plato 3">
                                        </div>
                                    @endif
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#menuCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Anterior</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#menuCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Siguiente</span>
                                </button>
                            </div>

                            <div class="menu-description mb-4">
                                <b>{!! nl2br(e($menu->descripcion)) !!}</b>
                            </div>

                            <div class="mt-4">
                                <h4 class="text-primary">Precio del Menú: {{ number_format($menu->precio, 2) }} €</h4>
                            </div>
                        </div>
                    @else
                        <div class="text-center">
                            <p class="text-muted">Lo sentimos, el menú para hoy aún no está disponible.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
