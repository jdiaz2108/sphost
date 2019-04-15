@extends('layouts.base')

@section('title', 'Listar Facturas - ')

@section('content')
<div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Lista de Facturas</strong>
                            </div>
                            <div class="card-body">
                                <table id="table_id" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Numero</th>
                                            <th>Fecha</th>
                                            <th>Nombre</th>
                                            <th>Nit</th>
                                            <th>Productos</th>
                                            <th>Total</th>
                                            <th>Botones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($facturas as $factura)
                                        <tr>
                                            <td>{{$factura->numero}}</td>
                                            <td>{{$factura->date}}</td>
                                            <td>{{$factura->nombre}}</td>
                                            <td>{{$factura->nit}}</td>
                                            <td>{{$factura->productos->count()}}</td>
                                            <td>{{$factura->total}}</td>
                                            <td>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="/clientes/{{$factura->nit}}" class="btn btn-primary input-group-addon">Ver</a>
                                            </div>
                                        </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
</div>

        @endsection
        @section('script')
<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            "pagingType": "full_numbers",
            "order": [[ 0, "desc" ]]
        });
    } );
    </script>
@endsection