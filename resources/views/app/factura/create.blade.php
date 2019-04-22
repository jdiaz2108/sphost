@extends('layouts.base')

@section('title', 'Cliente Factura - ')

@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <create-factura :crudstatus="'{{$crudstatus}}'" :productos="{{$productos}}"></create-factura>
            </div>
        </div><!-- .animated -->
    </div>
@endsection
