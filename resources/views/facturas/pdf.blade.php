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
body {
	background:
    /* url('/images/BGcobro2.jpg')*/    /* image */
     center center / 100px 100px /* position / size */
     no-repeat                /* repeat */
     relative                    /* attachment */
     padding-box              /* origin */
     content-box              /* clip */
     white;                     /* color */
}
</style>
</head>
@php
$NoCuenta = 123;
$HCuenta = 537;
$VendidoEncargado = 157;
$DirTelMail = 188;
$YDatos = 552;
$YProducto = 245;
@endphp
<body>
<div>
{{-- {{$data->productos}} --}}
{{-- Numero Cuenta de Cobro --}}
<img src="./images/BGcobro3.jpg" style=" max-width: 100%; position: absolute;" alt="">
<h1  class="conf" style="font-size:25px; left: 675px; top: {{$NoCuenta - 17}}px; color: #c80000">No. {{$data->id}}</h1>
<h1  class="conf" style="font-size:25px; left: 675px; top: {{$NoCuenta + $HCuenta}}px; color: #c80000">No. {{$data->id}}</h1>

{{-- Vendido a: --}}
<h1 class="conf" style="font-size:15px; left: 110px; top: {{$VendidoEncargado}}px;">{{$data->nombre}}</h1>
<h1 class="conf" style="font-size:15px; left: 110px; top: {{$VendidoEncargado + $YDatos}}px;">{{$data->nombre}}</h1>

{{-- Encargado: --}}
<h1 class="conf" style="font-size:15px; right: 50px; top: {{$VendidoEncargado}}px;">{{$data->nit}}</h1>
<h1 class="conf" style="font-size:15px; right: 50px; top: {{$VendidoEncargado + $YDatos}}px;">{{$data->nit}}</h1>

{{-- Direccion --}}
<h1 class="conf" style="font-size:15px; left: 106px; top: {{$DirTelMail}}px;">{{$data->direccion}}</h1>
<h1 class="conf" style="font-size:15px; left: 106px; top: {{$DirTelMail + $YDatos}}px;">{{$data->direccion}}</h1>

{{-- Telefono --}}
<h1 class="conf" style="font-size:15px; left: 375px; top: {{$DirTelMail}}px;">{{$data->telefono}}</h1>
<h1 class="conf" style="font-size:15px; left: 375px; top: {{$DirTelMail + $YDatos}}px;">{{$data->telefono}}</h1>

{{-- Mail --}}
<h1 class="conf" style="font-size:15px; left: 583px; top: {{$DirTelMail}}px;">{{$data->correo}}</h1>
<h1 class="conf" style="font-size:15px; left: 583px; top: {{$DirTelMail + $YDatos}}px;">{{$data->correo}}</h1>

{{-- Productos --}}
@foreach($data->productos as $producto)
<h1 class="conf" style="font-size:15px; left: 50px; top: {{$YProducto}}px;">{{$producto->qty}}</h1>
<h1 class="conf" style="font-size: 15px; left: 90px; top: {{$YProducto}}px; /*border-style: solid;*/ width: 530px">{{$producto->descripcion}}</h1>
<h1 class="conf" style="font-size:15px; right: 150px; top: {{$YProducto}}px;">$ {{$producto->valor}}</h1>
<h1 class="conf" style="font-size:15px; right: 50px; top: {{$YProducto}}px;">$ {{$producto->qty * $producto->valor}}</h1>
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
</div>
</body>
</html>
