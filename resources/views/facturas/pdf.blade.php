<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><head>
	    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>


    <!-- Styles -->
<style type="text/css" media="all">
@page {
	margin: 0px;
	padding: 0px;
}
.conf {
	position: absolute;
	font-weight: lighter;
}

.fnt-25 {
    font-size: 25px;
}

.fnt-15 {
    font-size: 15px;
}

.l-553 {
    left: 140mm;
}
.l-365 {
    left: 95mm;
}

.l-vyd {
    left: 33mm;
}

.img-pdf:before {
    content: '';
    background-image: url('./images/BGcobro3.jpg');
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-position: center;
    transform: scale(0.9);
    position: absolute;
    top: -10mm;
    left: 0;
    padding: 10mm 0;

}

.img-pdf {
    position: relative;
}

</style>
</head>
@php
$NoCuenta = 31;
$HCuenta = 132;

$VendidoEncargado = 43;
$DirTelMail = 50.5;

$YDatos = 132;

$YProducto = 64;


@endphp
<body class="img-pdf">
    <h1  class="conf fnt-25" style="left: 170mm; top: {{$NoCuenta + $HCuenta}}mm; color: #c80000">No. {{$data->id}}</h1>
    <h1  class="conf fnt-25" style="left: 170mm; top: {{$NoCuenta}}mm; color: #c80000">No. {{$data->id}}</h1>
    
    {{-- Vendido a: --}}
    <h1 class="conf fnt-15 l-vyd" style="top: {{$VendidoEncargado}}mm;">{{$data->nombre}}</h1>
    <h1 class="conf fnt-15 l-vyd" style="top: {{$VendidoEncargado + $YDatos}}mm;">{{$data->nombre}}</h1>
    
    {{-- Encargado: --}}
    <h1 class="conf fnt-15" style="left: 165mm; top: {{$VendidoEncargado}}mm;">{{$data->nit}}</h1>
    <h1 class="conf fnt-15" style="left: 165mm; top: {{$VendidoEncargado + $YDatos}}mm;">{{$data->nit}}</h1>
    
    {{-- Direccion --}}
    <h1 class="conf fnt-15 l-vyd" style="top: {{$DirTelMail}}mm;">{{$data->direccion}}</h1>
    <h1 class="conf fnt-15 l-vyd" style="top: {{$DirTelMail + $YDatos}}mm;">{{$data->direccion}}</h1>
    
    {{-- Telefono --}}
    <h1 class="conf fnt-15 l-365" style="top: {{$DirTelMail}}mm;">{{$data->telefono}}</h1>
    <h1 class="conf fnt-15 l-365" style="top: {{$DirTelMail + $YDatos}}mm;">{{$data->telefono}}</h1>
    
    {{-- Mail --}}
    <h1 class="conf fnt-15 l-553" style="top: {{$DirTelMail}}mm;">{{$data->correo}}</h1>
    <h1 class="conf fnt-15 l-553" style="top: {{$DirTelMail + $YDatos}}mm;">{{$data->correo}}</h1>
    
    {{-- Productos --}}
    @foreach($data->productos as $producto)
    <h1 class="conf fnt-15" style="left: 20mm; top: {{$YProducto}}mm;">{{$producto->qty}}</h1>
    <h1 class="conf fnt-15" style="left: 30mm; top: {{$YProducto}}mm; /*border-style: solid;*/ width: 530mm">{{$producto->descripcion}}</h1>
    <h1 class="conf fnt-15" style="left: 150mm; top: {{$YProducto}}mm;">$ {{$producto->valor}}</h1>
    <h1 class="conf fnt-15" style="left: 170mm; top: {{$YProducto}}mm;">$ {{$producto->qty * $producto->valor}}</h1>
    @php
    if (strlen($producto->descripcion) <= 76) {
        $YProducto = $YProducto + 25;
    } elseif (strlen($producto->descripcion) <= 155) {
        $YProducto = $YProducto + 100;
    } elseif (strlen($producto->descripcion) <= 228) {
        $YProducto = $YProducto + 90;
    } elseif (strlen($producto->descripcion) <= 300) {
        $YProducto = $YProducto + 62;
    }
    @endphp
    
    
    @endforeach
</body>
</html>
