@extends('layouts.base')

@section('title', 'Listar Clientes - ')

@section('content')
<div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Lista de Clientes</strong>
                            </div>
                            <div class="card-body">
                                <table id="table_id" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Nit</th>
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                            <th>Dirección</th>
                                            <th>Botones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($clientes as $cliente)
                                        <tr>
                                            <td>{{$cliente->nombre}}</td>
                                            <td>{{$cliente->nit}}</td>
                                            <td>{{$cliente->correo}}</td>
                                            <td>{{$cliente->telefono}}</td>
                                            <td>{{$cliente->direccion}}</td>
                                            <td>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="/clientes/{{$cliente->nit}}" class="btn btn-primary input-group-addon">Ver</a>
                                            </div>
                                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                {!! Form::open(['route' => ['clientes.destroy', $cliente->nit], 'method' => 'DELETE' ])!!}
                                                    {!! Form::button('Eliminar', ['class' => 'btn btn-danger input-group-addon' , 'data-toggle' => 'modal' , 'data-target' => '#Modal'.$cliente->id ])!!}
                                                    <div class="modal fade" id="Modal{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabell{{$cliente->id}}" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabell{{$cliente->id}}">Ventana de Confirmación</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            Esta seguro que desea eliminar el cliente: {{$cliente->nombre}} ?
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                                                            {!! Form::submit('Eliminar Cliente', ['class' => 'btn btn-danger'])!!}
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                {!! Form::close() !!}
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
            "pagingType": "full_numbers"
        });
    } );
    </script>
@endsection