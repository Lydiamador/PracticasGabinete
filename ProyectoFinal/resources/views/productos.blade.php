@extends('layouts.app')

@section('title', 'Nuestros Productos')

@section('content')
<div class="container">
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
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                 id="{{ Str::slug($categoria) }}"
                 role="tabpanel"
                 aria-labelledby="{{ Str::slug($categoria) }}-tab">
                
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($items as $producto)
                        <div class="col">
                            <div class="card h-100">
                                <!-- Bebidas Calientes -->
                                @if($producto->nombre === 'Café Americano')
                                    <img src="{{ asset('img/Bebidas_Calientes/cafeAmericano.jpeg') }}"
                                         class="card-img-top"
                                         alt="Café Americano"
                                         style="height: 250px; object-fit: cover;">                                      
                                @endif
                                @if($producto->nombre === 'Capuchino')
                                    <img src="{{ asset('img/Bebidas_Calientes/Capuchino.jpeg') }}"
                                         class="card-img-top"
                                         alt="Capuchino"
                                         style="height: 250px; object-fit: cover;">  
                                @endif
                                @if($producto->nombre === 'Latte')
                                    <img src="{{ asset('img/Bebidas_Calientes/Latte.jpg') }}"
                                         class="card-img-top"
                                         alt="Latte"
                                         style="height: 250px; object-fit: cover;">  
                                @endif
                                <!-- Bebidas  Frias -->
                                @if($producto->nombre === 'Té Helado')
                                    <img src="{{ asset('img/Bebidas_Frias/Te.webp') }}"
                                         class="card-img-top"
                                         alt="Té Helado"
                                         style="height: 250px; object-fit: cover;">                                      
                                @endif
                                @if($producto->nombre === 'Frappé de Chocolate')
                                    <img src="{{ asset('img/Bebidas_Frias/Frappe.jpg') }}"
                                         class="card-img-top"
                                         alt="Frappé de Chocolate"
                                         style="height: 250px; object-fit: cover;">  
                                @endif
                                <!-- Repostería -->
                                @if($producto->nombre === 'Croissant')
                                    <img src="{{ asset('img/Reposteria/croissant.jpg') }}"
                                         class="card-img-top"
                                         alt="Croissant"
                                         style="height: 250px; object-fit: cover;">                                      
                                @endif
                                @if($producto->nombre === 'Muffin de Arándanos')
                                    <img src="{{ asset('img/Reposteria/Muffin.jpg') }}"
                                         class="card-img-top"
                                         alt="Muffin de Arándanos"
                                         style="height: 250px; object-fit: cover;">  
                                @endif
                                @if($producto->nombre === 'Cheesecake')
                                    <img src="{{ asset('img/Reposteria/Cheesecake.jpg') }}"
                                         class="card-img-top"
                                         alt="Cheesecake"
                                         style="height: 250px; object-fit: cover;">  
                                @endif
                                <!-- Sándwiches -->
                                @if($producto->nombre === 'Sándwich de Jamón y Queso')
                                    <img src="{{ asset('img/Sandwiches/Sandwich.jpg') }}"
                                         class="card-img-top"
                                         alt="Sándwich de Jamón y Queso
"
                                         style="height: 250px; object-fit: cover;">                                      
                                @endif
                                @if($producto->nombre === 'Bagel con Salmón y Queso Crema')
                                    <img src="{{ asset('img/Sandwiches/bagel.jpg') }}"
                                         class="card-img-top"
                                         alt="Bagel con Salmón y Queso Crema"
                                         style="height: 250px; object-fit: cover;">  
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                                    <p class="card-text">
                                        <span class="badge bg-primary">{{ $producto->categoria }}</span>
                                        <span class="fs-5 fw-bold text-primary float-end">{{ number_format($producto->precio, 2) }}€</span>
                                    </p>
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
