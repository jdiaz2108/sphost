<template>
    <div class="col-12">

        <v-dialog v-model="dialog" scrollable v-if="clientes">
            <v-card>

                <v-card-title>
                    Buscar Cliente
                    <v-spacer></v-spacer>
                    <v-text-field v-model="search" append-icon="search" label="Buscar" single-line hide-details>
                    </v-text-field>
                </v-card-title>
                <v-data-table :headers="headers" :items="clientes" :search="search">

                    <template v-slot:items="props">
                        <td>{{ props.item.nombre }}</td>
                        <td class="text-xs-right">{{ props.item.nit }}</td>
                        <td class="text-xs-right">{{ props.item.direccion }}</td>
                        <td class="text-xs-right">{{ props.item.telefono }}</td>
                        <td class="text-xs-right">{{ props.item.ciudad }}</td>
                        <td class="text-xs-right">{{ props.item.correo }}</td>
                        <td class="text-xs-right">
                            <div class="btn btn-primary" @click="ClienteCreado(props.item)"><i
                                    class="fa fa-arrow-right"></i> Seleccionar</div>
                        </td>
                    </template>
                    <v-alert v-slot:no-results :value="true" color="error" icon="warning">
                        Tu busqueda por "{{ search }}" no dio resultados.
                    </v-alert>
                </v-data-table>


                <v-card-actions>
                    <v-btn color="blue-grey lighten-4" @click="dialog = false"><i class="fa fa-times-circle mr-3"></i>
                        Cancelar</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>




        <v-dialog v-model="dialog2" scrollable>
            <v-card>
                <v-card-title>
                    Seleccionar Productos
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
                                        <th scope="col">Inventario</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Valor Unitario</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="producto, key in objetossss">
                                        <td>{{ producto.nombre }}</td>
                                        <td>{{ producto.qty }}</td>
                                        <td>
                                            <p>{{ producto.descripcion}}</p>
                                        </td>
                                        <td>{{ producto.valor }}</td>
                                        <td><button class="btn btn-primary btn-xs" type="button"
                                                @click="addProducto(key, producto)"><i class="fa fa-plus"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <v-card-actions>
                    <v-btn color="blue-grey lighten-4" @click="dialog2 = false"><i class="fa fa-times-circle mr-3"></i>
                        Cancelar</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>



        <form @submit.prevent="PSend" method="POST" class="col-12 form-group">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <v-btn color="primary" dark @click="AllClientes(); dialog = true"><i
                                    class="fa fa-search mr-3"></i> Buscar Cliente</v-btn>





                        </div>
                        <div class="card-body card-block">

                            <input type="hidden" name="_token" :value="csrf">

                            <div class="row form-group">
                                <div class="col-3 col-md-3"><label for="nombre"
                                        class="form-control-label">Fecha.</label></div>
                                <div class="col-9 col-md-9">
                                    <v-dialog ref="dialog" v-model="modal" :return-value.sync="date" persistent lazy
                                        full-width dark width="290px" locale="es">
                                        <template v-slot:activator="{ on }">
                                            <v-text-field label="Fecha actual" v-model="date" prepend-icon="event"
                                                readonly v-on="on"></v-text-field>
                                        </template>
                                        <v-date-picker v-model="date" scrollable>
                                            <v-spacer></v-spacer>
                                            <v-btn flat color="primary" @click="modal = false">Cancel</v-btn>
                                            <v-btn flat color="primary" @click="$refs.dialog.save(date)">OK</v-btn>
                                        </v-date-picker>
                                    </v-dialog>
                                </div>
                            </div>

                            <div class="row form-group d-flex align-center">
                                <div :class="htmls.labels"><label for="nombre" class="form-control-label">Nombre del
                                        Cliente:</label></div>
                                <div :class="htmls.inputs">
                                    <input type="text" id="nombre" v-model="cliente.nombre" class="form-control">
                                </div>

                                <div :class="htmls.labels"><label for="mail" class="form-control-label">Correo
                                        Electrónico.</label></div>
                                <div :class="htmls.inputs">
                                    <input type="text" id="mail" v-model="cliente.correo" class="form-control">
                                </div>


                                <div :class="htmls.labels">
                                    <label for="nit" class="form-control-label">Numero Identificador:</label></div>
                                <div :class="htmls.inputs">
                                    <input type="text" name="nit" v-model="cliente.nit" class="form-control">
                                </div>


                                <div :class="htmls.labels"><label class=" form-control-label">Nit o CC.</label></div>
                                <div :class="htmls.inputs">
                                    <v-radio-group v-model="cliente.ide" row>
                                        <v-radio label="Nit" :value="0"></v-radio>
                                        <v-radio label="CC" :value="1"></v-radio>
                                    </v-radio-group>
                                </div>


                                <div :class="htmls.labels"><label for="telefono" class="form-control-label">Telefono -
                                        Celular:</label></div>
                                <div :class="htmls.inputs">
                                    <input type="text" id="telefono" v-model="cliente.telefono" class="form-control">
                                </div>

                                <div :class="htmls.labels">
                                    <label for="direccion" class="form-control-label">Dirección:</label></div>
                                <div :class="htmls.inputs">
                                    <input type="text" id="direccion" v-model="cliente.direccion" class="form-control">
                                </div>

                                <div :class="htmls.labels"><label for="ciudad"
                                        class="form-control-label">Ciudad:</label></div>
                                <div :class="htmls.inputs">
                                    <input type="text" id="ciudad" v-model="cliente.ciudad" class="form-control">
                                </div>

                                <div :class="htmls.labels"><label for="encargado"
                                        class="form-control-label">Encargado:</label></div>
                                <div :class="htmls.inputs">
                                    <input type="text" v-model="cliente.encargado" class="form-control">
                                </div>

                                <div class="py-2 col-3 col-md-3"></div>
                                <div class="py-2 col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button v-if="newProducto.length > 0" type="submit"
                                        class="btn btn-lg btn-success">Crear</button>
                                </div>
                            </div>









                            <div class="row p-3">
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
                                            <td><button class="btn btn-sm btn-danger btn-xs prod-'+productos[i].id+'"
                                                    type="button" @click="delProducto(key)"><i
                                                        class="fa fa-trash-o"></i></button></td>
                                            <td><input class="form-control" v-model.number="nowpro.nombre"></td>
                                            <td><input type="number" class="form-control" size="5" v-model.number="nowpro.qty"
                                                    @change="nowpro.total = nowpro.valor * nowpro.qty; totals()"></td>
                                            <td>
                                                <div class="form-group">
                                                    <textarea class="form-control" v-model="nowpro.descripcion" rows="5"
                                                        id="comment"></textarea>
                                                </div>
                                            </td>
                                            <td><input type="number" class="form-control" v-model.number="nowpro.valor"
                                                    @change="nowpro.total = nowpro.valor * nowpro.qty; totals()">
                                            </td>
                                            <td><span>{{formatPrice(nowpro.total)}}</span></td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm"
                                                    @click="dialog2 = true" data-toggle="modal"
                                                    data-target=".bd-example-modal-lg">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </td>
                                            <td colspan="5"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"></td>
                                            <td>Subtotal:</td>
                                            <td>{{formatPrice(subtotal)}}</td>
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
                                            <td>{{formatPrice(total)}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>




                        </div>
                        <div class="card-footer">
                            <div class="p-3"></div>
                        </div>






                    </div>
                </div>
            </div>
            <button type="button" @click="PSend()" class="btn btn-danger">Enviar</button>
        </form>


    </div>
</template>

<script>
    import Vuetify from 'vuetify'
    export default {
        data() {
            return {
                htmls: {
                    labels: {
                        'py-2': true,
                        'col-3': true,
                        'col-md-2': true,     
                    },
                    inputs: {
                        'py-2': true,
                        'col-9': true,
                        'col-md-4': true,
                    }
                },
                search: '',
                headers: [
                    { text: 'Nombre', align: 'left', value: 'nombre' },
                    { text: 'Nit o CC', align: 'right', value: 'nit' },
                    { text: 'Direccion', align: 'right', value: 'direccion' },
                    { text: 'Telefono', align: 'right', value: 'telefono' },
                    { text: 'Ciudad', align: 'right', value: 'ciudad' },
                    { text: 'Correo', align: 'right', value: 'correo' },
                    { text: 'Seleccion', align: 'right', value: 'seleccion' }
        ],
        subtotal: 0,
        total: 0,
        impuesto: 0,
        descuento: 0,
                dialog: false,
                dialog2: false,
                objetos: null,
clientes: null,
                column: null,
                objetosss: null,
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
            formatPrice: function(value) {
                let val = (value/1).toFixed(0).replace('.', ',');
                return '$ '+val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            },
            alertini: function(vari) {
                console.log(vari)
            },
            AllClientes: function(id){
                axios({
                  method: 'get',
                  url: 'api/clientes',
                })
                .then(response => (this.clientes = response.data.data))
                .then(function(res){
                    console.log(res)
                    //window.location = "/factura"
                })
                .catch(function(err){
                    console.log(err)
                })

            },
            PSend: function(){
                if ($.isEmptyObject(this.cliente)) {
                    this.alertSwal('error', 'Es necesario seleccionar un cliente');
                } else {
                    this.cliente.date = this.date;
                    axios({
                    method: 'post',
                    url: 'api/factura',
                    data: { 

                        newProducto: this.newProducto,
                        cliente: this.cliente,


                            }
                    })
                    .then(function(res){
                        console.log(res)
                        this.alertSwal('success', 'Se ha generado una nueva factura');
                        //window.location = "/factura/"+ res.data.message
                    })
                    .catch(function(err){
                        console.log(err)
                    })
                }
            },
            ClienteCreado: function(id) {
                this.cliente = id;
                this.dialog = false;
            },
            addProducto: function(id, test) {
console.log(test);
                this.dialog2 = false;
                this.newProducto.push({
                        producto_id: this.productos[id].id,
                        nombre: this.productos[id].nombre,
                        valor: this.productos[id].valor,
                        descripcion: this.productos[id].descripcion,
                        qty: this.productos[id].qty,
                        total: this.productos[id].total,
                    });

                this.productos[id].qty = 1;
                this.productos[id].total = this.productos[id].valor;
                this.totals();



                //alert(JSON.stringify(this.productos[id]));
            },
            delProducto: function(id) {
                this.newProducto.splice(id, 1);
            },
            pruebatest: function() {
                console.log('si llega')
            },
            totals: function() {
                var s = 0;
                for (var i = 0; i < this.newProducto.length; i++) {
                    s = s + parseInt(this.newProducto[i].total)
                }
                this.subtotal = s;
            },
            alertSwal: function(title, alert) {
                Swal({
                      title: alert,
                      type: title,
                      confirmButtonText: 'Ok'
                })
            }
        },
        computed: {

            objetossss: function () {
                    for (var i = 0; i < this.productos.length; i++) {
                        this.productos[i].total = this.productos[i].valor
                    }
                    return this.productos
              }

        }
    }
</script>

<style>
[type=number] {
    width: 80px !important;
}
</style>
