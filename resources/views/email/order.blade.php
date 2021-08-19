<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden # {{ $order->order->code }}</title>
</head>
<body>
    <h1>Detalle de pedido</h1>
    <table>
        <thead>
            <tr>#</tr>
            <tr>Product</tr>
            <tr>Precio</tr>
            <tr>Cantidad</tr>
        </thead>
        <tbody>
            @foreach($order as $key => $data)
            <tr>
                <td>{{$key}}</td>
                <td>{{$data->product->name}}</td>
                <td>{{$data->product->price}}</td>
                <td>{{$data->quantity}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>