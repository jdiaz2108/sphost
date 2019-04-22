@extends('layouts.base')

@section('title', 'Cliente Crear - ')

@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <vue-clientes :crudstatus="'{{$crudstatus}}'"></vue-clientes>
                </div>
            </div>
        </div>
    </div>
@endsection