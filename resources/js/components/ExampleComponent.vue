<template>
    <div class="col-12">







    <v-dialog v-model="dialog2" scrollable >
      <v-card>

    <v-card-title>
      Modal Heading
      <v-spacer></v-spacer>
<button type="button" class="close" @click="dialog2 = false">&times;</button>
    </v-card-title>
    
<div class="px-5">
                        <div class="x_panel">
                            <div class="x_content">
                            <table id="datatable-fixed-header" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                           
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="producto, key in productos">
                            <td>{{ producto.nombre }}</td>
                            <td><input class="form-control" type="number" value="42" v-model="producto.qty" min="1"></td>
                            <td><p>{{ producto.descripcion}}</p></td>
                            <td>{{ producto.valor }}</td>
                            <td><button class="btn btn-primary btn-xs prod-'+productos[i].id+'" type="button" @click="addProducto(key)"><i class="fa fa-plus"></i></button></td>
                            </tr>
                            </tbody>
                            </table>
                            </div>
                        </div>
                    </div>


        <v-card-actions>
          <v-btn color="blue-grey lighten-4" @click="dialog2 = false"><i class="fa fa-times-circle mr-3"></i> Cancelar</v-btn>
                  </v-card-actions>
      </v-card>
    </v-dialog>



<form @submit.prevent="PSend" method="POST" class="col-12 form-group">
    <div class="container-fluid">
    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                


    <v-dialog v-model="dialog" scrollable >
      <template v-slot:activator="{ on }">
        <v-btn color="primary" dark v-on="on" @click="AllClientes()"><i class="fa fa-search mr-3"></i> Buscar Cliente</v-btn>
      </template>
      <v-card>

    <v-card-title>
      Buscar Cliente
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="search"
        label="Buscar"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table
      :headers="headers"
      :items="clientes"
      :search="search"
    >
      <template v-slot:items="props">
        <td>{{ props.item.nombre }}</td>
        <td class="text-xs-right">{{ props.item.nit }}</td>
        <td class="text-xs-right">{{ props.item.direccion }}</td>
        <td class="text-xs-right">{{ props.item.telefono }}</td>
        <td class="text-xs-right">{{ props.item.ciudad }}</td>
        <td class="text-xs-right">{{ props.item.correo }} <div class="btn btn-primary" @click="ClienteCreado(props.item.id)"><i class="fa fa-arrow-right"></i> Seleccionar</div></td>
      </template>
      <v-alert v-slot:no-results :value="true" color="error" icon="warning">
        Tu busqueda por "{{ search }}" no dio resultados.
      </v-alert>
    </v-data-table>


        <v-card-actions>
          <v-btn color="blue-grey lighten-4" @click="dialog = false"><i class="fa fa-times-circle mr-3"></i> Cancelar</v-btn>
                  </v-card-actions>
      </v-card>
    </v-dialog>



                            </div>
                            <div class="card-body card-block">
                                
                                <input type="hidden" name="_token" :value="csrf"> 

                                <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="nombre" class="form-control-label">Fecha.</label></div>
                                         <div class="col-12 col-md-9">

                                                  <v-dialog
                                                    ref="dialog"
                                                    v-model="modal"
                                                    :return-value.sync="date"
                                                    persistent
                                                    lazy
                                                    full-width
                                                    dark
                                                    width="290px"
                                                    locale="es"
                                                  >
                                                    <template v-slot:activator="{ on }">
                                                      <v-text-field
                                                        v-model="date"
                                                        label="Picker in dialog"
                                                        prepend-icon="event"
                                                        readonly
                                                        v-on="on"
                                                      ></v-text-field>
                                                    </template>
                                                    <v-date-picker v-model="date" scrollable>
                                                      <v-spacer></v-spacer>
                                                      <v-btn flat color="primary" @click="modal = false">Cancel</v-btn>
                                                      <v-btn flat color="primary" @click="$refs.dialog.save(date)">OK</v-btn>
                                                    </v-date-picker>
                                                  </v-dialog>


 
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="nombre" class="form-control-label">Nombre del Cliente.</label></div>
                                         <div class="col-12 col-md-9">
                                            <input type="text" id="nombre" v-model="cliente.nombre" class="form-control" placeholder="Nombre del Cliente.">
                                            <small class="form-text text-muted">Nombre del Cliente.</small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Nit o CC.</label></div>
                                        <div class="col col-md-9">
                                            <v-radio-group v-model="row" row>
                                              <v-radio label="Nit" value="radio-1"></v-radio>
                                              <v-radio label="CC" value="radio-2"></v-radio>
                                            </v-radio-group>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="nit" class="form-control-label">Numero Identificador:</label></div>
                                         <div class="col-12 col-md-9">
                                            <input type="text" name="nit" @keyup="ClienteCall(cliente.nit)" v-model="cliente.nit" class="form-control" placeholder="Nit o CC.">
                                            <small class="form-text text-muted">Formato 999.999.999-9.</small>
                                        </div>
                                    </div>

                        


                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="telefono" class="form-control-label">Telefono - Celular:</label></div>
                                         <div class="col-12 col-md-9">
                                            <input type="text" id="telefono" v-model="cliente.telefono" class="form-control" placeholder="Telefono - Celular.">
                                            <small class="form-text text-muted">Telefono o Celular del Cliente.</small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="direccion" class="form-control-label">Dirección:</label></div>
                                         <div class="col-12 col-md-9">
                                            <input type="text" id="direccion" v-model="cliente.direccion" class="form-control" placeholder="Direccion.">
                                            <small class="form-text text-muted">Direccion del Cliente.</small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="ciudad" class="form-control-label">Ciudad:</label></div>
                                         <div class="col-12 col-md-9">
                                            <input type="text" id="ciudad" v-model="cliente.ciudad" class="form-control" placeholder="Ciudad.">
                                            <small class="form-text text-muted">Ciudad ubicacion Cliente.</small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="encargado" class="form-control-label">Encargado:</label></div>
                                         <div class="col-12 col-md-9">
                                            <input type="text" v-model="cliente.encargado" class="form-control" placeholder="Encargado.">
                                            <small class="form-text text-muted">Encargado.</small>
                                        </div>
                                    </div>

                                        <hr class="w-75 text-center py-3">

                                     <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button v-if="newProducto.length > 0" type="submit" class="btn btn-lg btn-success">Crear</button>
                                      </div>
                                    </div>

                            </div>
                            <div class="card-footer">
                                <div class="p-3"></div>
                            </div>






                        </div>
                    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                    <input type="hidden" name="newProducto" :value="newProducto">
                <div class="card card-default">
                    <div class="card-header">Artículos</div>



                    <div class="card-body">


<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_content">
            <table id="datatable-fixed-header" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Acciones</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Descripcion</th>
                        <th>Valor</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="nowpro, key in newProducto">
                        <input type="hidden" :name="nowpro.id_producto" :value="nowpro">
                        <td><button class="btn btn-sm btn-danger btn-xs prod-'+productos[i].id+'" type="button" @click="delProducto(key)"><i class="fa fa-trash-o"></i></button></td>
                        <td>{{ nowpro.nombre }}</td>
                        <td><input type="number" v-model.number="nowpro.qty"></td>
                        <td>
                            <div class="form-group">
                                <textarea class="form-control" v-model="nowpro.descripcion" rows="5" id="comment"></textarea>
                            </div>
                        </td>
                        <td><input type="number" v-model.number="nowpro.valor"></td>
                        <td><input type="number" v-model.number="nowpro.valor"></td>

                    </tr>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" @click="dialog2 = true" data-toggle="modal" data-target=".bd-example-modal-lg">
                                <i class="fa fa-plus"></i>
                            </button>
                        </td>
                        <td colspan="5"></td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td>Subtotal:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td>Agregar Descuento:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td>Impuestos:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td>Total:</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



             <hr>
                    <!-- <div class="jumbotron jumbotron-fluid"><pre>{{ $data }}</pre></div> -->



                    </div>
                </div>
                <button type="button" class="btn btn-primary" @click="AllClientes()">clientes</button>
                    <button type="submit">enviar</button>
               
            </div>
        </div>
    </div>
    </div>
    </form>





</div>
</template>

<script>
    import Vuetify from 'vuetify'
    export default {
        data() {
            return {
                search: '',
                headers: [
                    { text: 'Nombre', align: 'left', sortable: false, value: 'nombre' },
                    { text: 'Nit o CC', align: 'right', value: 'nit' },
                    { text: 'Direccion', align: 'right', value: 'direccion' },
                    { text: 'Telefono', align: 'right', value: 'telefono' },
                    { text: 'Ciudad', align: 'right', value: 'ciudad' },
                    { text: 'Seleccion', align: 'right', value: 'seleccion' }
        ],
                dialog: false,
                dialog2: false,
clientes: null,
                column: null,
        row: null,
                  menu: false,
                  modal: false,
                  menu2: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                nombre: "nombre de prueba",
                date: new Date().toISOString().substr(0, 10),
                cliente: {},
                newProducto: []
            }
        },
        props: ['productos'],
        methods: {
            ClienteCall: function(id){
                this.cliente = {
                        nit: id,
                    },
                axios({
                  method: 'get',
                  url: 'clientes/'+ id,
                })
                .then(response => (this.cliente = response.data))
                .then(function(res){
                    console.log(res)
                    //window.location = "/factura"
                })
                .catch(function(err){
                    console.log(err)
                })

            },
            AllClientes: function(id){
                axios({
                  method: 'get',
                  url: 'clientes',
                })
                .then(response => (this.clientes = response.data))
                .then(function(res){
                    console.log(res)
                    //window.location = "/factura"
                })
                .catch(function(err){
                    console.log(err)
                })

            },
            PSend: function(){
                this.cliente.date = this.date;
                axios({
                  method: 'post',
                  url: '/factura',
                  data: { 

                    newProducto: this.newProducto,
                    clientes: this.cliente,


                         }
                })
                .then(function(res){
                    console.log(res)
                    Swal({
                      title: 'Error!',
                      text: 'Do you want to continue',
                      type: 'error',
                      confirmButtonText: 'Cool'
                    })
                    //window.location = "/factura/"+ res.data.message
                })
                .catch(function(err){
                    console.log(err)
                })

            },
            ClienteCreado: function(idcliente) {
                var results = this.clientes.filter(function (cliente) { return cliente.id == idcliente; });
                var firstObj = (results.length > 0) ? results[0] : null;
                console.log(idcliente);
                console.log(firstObj);
                this.cliente = firstObj;
                this.dialog = false;
            },
            addProducto1: function(id) {
                
                this.newProducto.push(this.productos[id]);
                //alert(JSON.stringify(this.productos[id]));
            },
            addProducto: function(id) {
                
                this.newProducto.push({
                        producto_id: this.productos[id].id,
                        nombre: this.productos[id].nombre,
                        valor: this.productos[id].valor,
                        descripcion: this.productos[id].descripcion,
                        qty: this.productos[id].qty,

                    });
                //alert(JSON.stringify(this.productos[id]));
            },
            delProducto: function(id) {
                this.newProducto.splice(id, 1);
            }
        }
    }
</script>