<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nuevo Pedido Realizado</title>
</head>
<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
        <h1 style="color: #333;">Nuevo Pedido Realizado</h1>
        
        <div style="background: #f9f9f9; padding: 20px; border-radius: 8px; margin: 20px 0;">
            <h3 style="color: #444;">Detalles del Pedido:</h3>
            <p><strong>ID del Pedido:</strong> #{{ $pedido->id }}</p>
            <p><strong>Fecha:</strong> {{ date('d/m/Y H:i', strtotime($pedido->fecha)) }}</p>
            <p><strong>Usuario:</strong> {{ $pedido->usuario->nombre }}</p>
            <p><strong>Total:</strong> {{ number_format($pedido->total, 2) }}€</p>
            
            <h4 style="color: #444; margin-top: 20px;">Productos:</h4>
            <ul style="list-style-type: none; padding: 0;">
                @foreach(explode(', ', $pedido->nombre) as $producto)
                    <li style="margin: 10px 0; padding: 10px; background: #fff; border-radius: 4px;">{{ $producto }}</li>
                @endforeach
            </ul>
        </div>
        
        <p style="color: #666; margin-top: 20px;">Este es un correo automático. Por favor, no responda a este mensaje.</p>
    </div>
</body>
</html>
