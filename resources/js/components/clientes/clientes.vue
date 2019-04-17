<template>
    <div class="card ">
        <div class="card-header"><strong class="card-title mb-3">Cliente</strong></div>
        <div class="card-body">

                            <div class="row form-group d-flex align-center">
                                <div :class="htmls.labels"><label for="nombre" class="form-control-label">Nombre del
                                        Cliente:</label></div>
                                <div :class="htmls.inputs">
                                    <input type="text" id="nombre" v-model="cliente.nombre" :disabled="ver" class="form-control">
                                </div>

                                <div :class="htmls.labels"><label for="mail" class="form-control-label">Correo
                                        Electrónico.</label></div>
                                <div :class="htmls.inputs">
                                    <input type="text" id="mail" v-model="cliente.correo" :disabled="ver"  class="form-control">
                                </div>


                                <div :class="htmls.labels">
                                    <label for="nit" class="form-control-label">Numero Identificador:</label></div>
                                <div :class="htmls.inputs">
                                    <input type="text" name="nit" v-model="cliente.nit" :disabled="ver"  class="form-control">
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
                                    <input type="text" id="telefono" v-model="cliente.telefono" :disabled="ver"  class="form-control">
                                </div>

                                <div :class="htmls.labels">
                                    <label for="direccion" class="form-control-label">Dirección:</label></div>
                                <div :class="htmls.inputs">
                                    <input type="text" id="direccion" v-model="cliente.direccion" :disabled="ver"  class="form-control">
                                </div>

                                <div :class="htmls.labels"><label for="ciudad"
                                        class="form-control-label">Ciudad:</label></div>
                                <div :class="htmls.inputs">
                                    <input type="text" id="ciudad" v-model="cliente.ciudad" :disabled="ver"  class="form-control">
                                </div>

                                <div :class="htmls.labels"><label for="encargado"
                                        class="form-control-label">Encargado:</label></div>
                                <div :class="htmls.inputs">
                                    <input type="text" v-model="cliente.encargado" :disabled="ver"  class="form-control">
                                </div>
<!-- 
                                <div class="py-2 col-3 col-md-3"></div>
                                <div class="py-2 col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button v-if="newProducto.length > 0" type="submit"
                                        class="btn btn-lg btn-success">Crear</button>
                                </div> -->
                            </div>

                <div class="dropdown-divider"></div>
                <p class="lead text-center font-weight-bold">Afiliaciones</p>


            <div v-if="ver == true">
                <a  role="button" @click="ver = false" class="btn btn-primary btn-lg text-light float-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
            </div>
            <div v-if="ver == false">
                <a role="button" @click="ver = true" class="btn btn-danger btn-lg float-right text-white mx-1">Cancelar</a>
                <a role="button" @click="sendCreate()" class="btn btn-warning btn-lg float-right mx-1">Guardar</a>
            </div>

        </div>
    </div>
</template>

<script>
    import Swal from "sweetalert2"
    export default {
        created() {
            // this.getAllDepartaments();
            // this.getCity();
            // this.AllAfp();
            // this.AllEps();
            // this.AllArl();
            // this.AllCcf();
            // this.AllPositions();
            // this.GetDepend();
        },
        props: ['personal', 'level'],
        data() {
            return {
                ver: true,
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
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                dataPersonal: {
                    position_id: null,
                    city_id: null,
                    number: null
                },
                cliente: {
                    nombre: 'jalex',
                    correo: 'jdiaz2108@hotmail.com',
                    nit: '1032458517',
                    ide: 1,
                    telefono: '3197113358',
                    direccion: 'calle 19a no 82 - 65',
                    ciudad: 'Bogotá',
                    encargado: 'Jalejos'
                },
                tipodocumento: null,
                allDepartaments: null,
                City: null,
                status: 'ver',
                allEps: null,
                allArl: null,
                allCcf: null,
                allAfp: null,
                allPositions: null,
                getDepend: null
            }
        },
        methods: {
            getAllDepartaments: function () {
                axios
                    .get('/Data/allDepartament')
                    .then(response => {
                        this.allDepartaments = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },

            Update: function () {
                axios
                    .put('/Em/' + this.dataPersonal.id, this.dataPersonal)
                    .then(response => {
                        this.status = 'ver';
                        console.log(response);
                        Swal({
                            type: 'success',
                            title: 'Se han Guardado los cambios',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            sendCreate: function () {

                axios({
                        method: 'post',
                        url: '/api/clientes',
                        data: {
                            cliente: this.cliente,
                        }
                    })
                    .then(function (res) {
                        console.log(res);
                        Swal({
                            title: 'alert',
                            type: 'success',
                            confirmButtonText: 'Aceptar'
                        });
                        this.ver = true;
                        //window.location = "/factura/"+ res.data.message
                    })
                    .catch(function (err) {
                        console.log(err)
                    })

            },
            sendEdit: function () {
                axios({
                        method: 'post',
                        url: '/api/clientes',
                        data: {
                            cliente: this.cliente,
                        }
                    })
                    .then(function (res) {
                        console.log(res);
                        this.alertSwal('success', 'Se ha generado una nueva factura');
                        //window.location = "/factura/"+ res.data.message
                    })
                    .catch(function (err) {
                        console.log(err)
                    })
            },
            alertSwal: function (title, alert) {
                Swal({
                    title: alert,
                    type: title,
                    confirmButtonText: 'Aceptar'
                })
            }
        }
    }
</script>