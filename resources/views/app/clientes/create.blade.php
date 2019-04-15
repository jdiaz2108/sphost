@extends('layouts.base')

@section('title', 'Cliente Crear - ')

@section('content')


        <div class="content">
            <div class="animated fadeIn">


                <div class="row">



                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Crear Cliente</strong>
                            </div>
                            <div class="card-body card-block">
                                {!! Form::open(['route' => 'clientes.store', 'method' => 'POST', 'files' => 'true' , 'class' => 'form-horizontal']) !!}                                  
                                    <div class="row form-group">
                                        <div class="col col-md-3">{!! Form::label('nombre', 'Nombre del cliente:' , ['class' => 'form-control-label']) !!}</div>
                                         <div class="col-12 col-md-9">
                                            {!! Form::text('nombre', null , ['class' => 'form-control' , 'required' => 'required', 'placeholder' => 'Nombre del Cliente.']) !!}
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Nit o CC.</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                <label for="nit" class="form-check-label ">
                                                    {!! Form::radio('ide', 0, true, ['class' => 'form-check-input']) !!} Nit.
                                                </label>
                                                <label for="nit" class="form-check-label ">
                                                    {!! Form::radio('ide', 1, false, ['class' => 'form-check-input']) !!} CC.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">{!! Form::label('nit', 'Numero Identificador:' , ['class' => 'form-control-label']) !!}</div>
                                         <div class="col-12 col-md-9">
                                            {!! Form::text('nit', null , ['class' => 'form-control' , 'required' => 'required']) !!}
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                            <div class="col col-md-3">{!! Form::label('correo', 'Correo Electrónico:' , ['class' => 'form-control-label']) !!}</div>
                                             <div class="col-12 col-md-9">
                                                {!! Form::text('correo', null , ['class' => 'form-control' , 'required' => 'required']) !!}
                                            </div>
                                        </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">{!! Form::label('telefono', 'Telefono - Celular:' , ['class' => 'form-control-label']) !!}</div>
                                         <div class="col-12 col-md-9">
                                            {!! Form::text('telefono', null , ['class' => 'form-control' , 'required' => 'required']) !!}
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">{!! Form::label('direccion', 'Dirección:' , ['class' => 'form-control-label']) !!}</div>
                                         <div class="col-12 col-md-9">
                                            {!! Form::text('direccion', null , ['class' => 'form-control' , 'required' => 'required']) !!}
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">{!! Form::label('ciudad', 'Ciudad:' , ['class' => 'form-control-label']) !!}</div>
                                         <div class="col-12 col-md-9">
                                            {!! Form::text('ciudad', null , ['class' => 'form-control' , 'required' => 'required']) !!}
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">{!! Form::label('encargado', 'Encargado:' , ['class' => 'form-control-label']) !!}</div>
                                         <div class="col-12 col-md-9">
                                            {!! Form::text('encargado', null , ['class' => 'form-control' , 'required' => 'required']) !!}
                                        </div>
                                    </div>

<hr class="w-75 text-center py-3">

                                     <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                      {!! Form::button('<i class="fa fa-floppy-o"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-lg btn-success']) !!}
                                       <a href="/clientes" class="btn btn-light border-secondary btn-lg"><i class="fa fa-times-circle"></i> Cancelar</a>
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
{{-- <script>
    $(document).ready( function () {
        $("#nit").inputmask("99[9][9].999.999-9");
    } );
    </script> --}}
@endsection