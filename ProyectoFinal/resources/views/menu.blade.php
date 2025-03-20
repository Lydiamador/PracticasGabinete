@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center mb-0">Menú del Día</h2>
                    <p class="text-center mb-0">{{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
                </div>
                <div class="card-body">
                    @if($menu)
                        <div class="text-center">
                            <h3 class="mb-4">Platos del Día</h3>
                            <div class="menu-description">
                                {!! nl2br(e($menu->descripcion)) !!}
                            </div>
                            <div class="mt-4">
                                <h4 class="text-primary">Precio: {{ number_format($menu->precio, 2) }} €</h4>
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

<style>
.menu-description {
    white-space: pre-line;
    font-size: 1.1rem;
    line-height: 1.6;
}
</style>
@endsection
