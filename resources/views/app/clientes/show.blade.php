@extends('layouts.base')

@section('title', 'Cliente - ')

@section('content')

<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Clientes</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Clientes</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">



                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Basic Form</strong> Elements
                            </div>
                            <div class="card-body card-block">
                                {!! Form::open(['route' => 'clientes.store', 'method' => 'POST', 'files' => 'true' , 'class' => 'form-horizontal']) !!}
                                   
                                    <div class="row form-group">
                                        <div class="col col-md-3">{!! Form::label('nombre', 'Nombre del cliente:' , ['class' => 'form-control-label']) !!}</div>
                                         <div class="col-12 col-md-9">
                                            <p class="form-control-static">{{$cliente->nombre}}</p>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Nit o CC.</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                @if($cliente->ide = 0)
                                                <label for="nit" class="form-check-label ">
                                                    {!! Form::radio('ide', 0, true, ['class' => 'form-check-input', 'disabled']) !!} Nit.
                                                </label>
                                                @else
                                                <label for="nit" class="form-check-label ">
                                                    {!! Form::radio('ide', 1, true, ['class' => 'form-check-input', 'disabled']) !!} CC.
                                                </label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">{!! Form::label('nit', 'Numero Identificador:' , ['class' => 'form-control-label']) !!}</div>
                                         <div class="col-12 col-md-9">
                                             <p class="form-control-static">{{$cliente->nit}}</p>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">{!! Form::label('telefono', 'Telefono - Celular:' , ['class' => 'form-control-label']) !!}</div>
                                         <div class="col-12 col-md-9">
                                             <p class="form-control-static">{{$cliente->telefono}}</p>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">{!! Form::label('direccion', 'Dirección:' , ['class' => 'form-control-label']) !!}</div>
                                         <div class="col-12 col-md-9">
                                             <p class="form-control-static">{{$cliente->direccion}}</p>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">{!! Form::label('ciudad', 'Ciudad:' , ['class' => 'form-control-label']) !!}</div>
                                         <div class="col-12 col-md-9">
                                             <p class="form-control-static">{{$cliente->ciudad}}</p>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">{!! Form::label('encargado', 'Encargado:' , ['class' => 'form-control-label']) !!}</div>
                                         <div class="col-12 col-md-9">
                                             <p class="form-control-static">{{$cliente->encargado}}</p>
                                        </div>
                                    </div>

<hr class="w-75 text-center py-3">

                                     <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                      {!! Form::submit('Crear', ['class' => 'btn btn-lg btn-success']) !!}
                                      </div>
                                    </div>

                                {!! Form::close() !!}
                            </div>
                            <div class="card-footer">
                                <div class="p-3"></div>
                            </div>
                        </div>
                    </div>



            </div>


        </div><!-- .animated -->
    </div>
    @endsection

            @section('script')
<script>
    $(document).ready( function () {
        $("#nit").inputmask("99[9][9].999.999-9");
    } );
    </script>
@endsection