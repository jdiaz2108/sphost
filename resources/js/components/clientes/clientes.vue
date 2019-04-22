<template>
    <div class="card mt-25">
        <div class="card-header">
                <div class="card-body moon-gradient flotting-45 shadow float-none">
                    <h3 class="m-0 text-center text-uppercase text-light">{{title}}</h3>
                </div>
        </div>
        <div class="card-body">
            <div class="row form-group d-flex align-center">
                <div :class="htmls.labels"><label for="nombre" class="form-control-label">Nombre del
                        Cliente:</label></div>
                <div :class="htmls.inputs">
                    <input type="text" id="nombre" v-model="cliente.nombre" :disabled="disabled" :class="{'form-control': true, 'is-invalid': errors.nombre? true : false}">
                    <div v-if="errors.nombre" class="invalid-feedback">{{errors.nombre}}</div>
                </div>
                <div :class="htmls.labels"><label for="mail" class="form-control-label">Correo
                        Electrónico.</label></div>
                <div :class="htmls.inputs">
                    <input type="text" id="mail" v-model="cliente.correo" :disabled="disabled" :class="{'form-control': true, 'is-invalid': errors.correo? true : false}">
                    <div v-if="errors.correo" class="invalid-feedback">{{errors.correo}}</div>
                </div>
                <div :class="htmls.labels">
                    <label for="nit" class="form-control-label">Numero Identificador:</label></div>
                <div :class="htmls.inputs">
                    <input type="text" id="nit" v-model="cliente.nit" :disabled="disabled" :class="{'form-control': true, 'is-invalid': errors.nit? true : false}">
                    <div v-if="errors.nit" class="invalid-feedback">{{errors.nit}}</div>
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
                    <input type="text" id="telefono" v-model="cliente.telefono" :disabled="disabled" class="form-control">
                </div>
                <div :class="htmls.labels">
                    <label for="direccion" class="form-control-label">Dirección:</label></div>
                <div :class="htmls.inputs">
                    <input type="text" id="direccion" v-model="cliente.direccion" :disabled="disabled" class="form-control">
                </div>
                <div :class="htmls.labels"><label for="ciudad" class="form-control-label">Ciudad:</label></div>
                <div :class="htmls.inputs">
                    <input type="text" id="ciudad" v-model="cliente.ciudad" :disabled="disabled" class="form-control">
                </div>
                <div :class="htmls.labels"><label for="encargado" class="form-control-label">Encargado:</label></div>
                <div :class="htmls.inputs">
                    <input type="text" v-model="cliente.encargado" :disabled="disabled" class="form-control">
                </div>
            </div>

            <div class="dropdown-divider"></div>
            <div v-if="crudstatus == 'show'">
                <div v-if="disabled == true">
                    <a role="button" @click="disabled = false; title = 'Editar cliente'" class="btn btn-primary btn-lg text-light float-right"><i
                            class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                </div>
                <div v-if="disabled == false">
                    <a role="button" @click="disabled = true; title = 'Ver cliente'" class="btn btn-danger btn-lg float-right text-white mx-1">Cancelar</a>
                    <a role="button" @click="updateCliente()" class="btn btn-warning btn-lg float-right mx-1">Guardar</a>
                </div>
            </div>
            <div v-else>
                <div>
                    <a role="button" @click="createCliente()" class="btn btn-success btn-lg text-light float-right">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Crear</a>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="p-3"></div>
        </div>
    </div>
</template>

<script>
    import Swal from "sweetalert2"
    export default {
        created() {
            //
        },
        mounted() {
            if (this.crudstatus == 'show') {
                 this.title = 'Ver Cliente';
                 this.getCliente();
            } else {
                this.title = 'Crear Cliente';
                this.cliente.ide = 0;
                this.disabled = false;
            }
        },
        data() {
            return {
                title: 'Cliente',
                disabled: true,
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
                cliente: {},
                status: 'ver',
                getDepend: null,
                errors: []
            }
        },
        props: ['crudstatus'],
        methods: {
            getCliente: function () {
                axios
                    .get('/api'+ window.location.pathname)
                    .then(response => {
                        this.cliente = response.data.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            updateCliente: function () {
                axios({
                        method: 'put',
                        url: '/api/clientes/' + this.cliente.slug,
                        data: this.cliente,
                    })
                    .then(response => {
                        this.disabled = true;
                        this.title = 'Ver cliente';
                        this.alertSwal('success', 'Se han Guardado los cambios');
                        this.errors = [];
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                        console.log(error)
                    })
            },
            createCliente: function () {
                    axios({
                            method: 'post',
                            url: '/api/clientes',
                            data: this.cliente,
                        })
                        .then(response => {
                            this.title = 'Editar Cliente';
                            this.crudstatus = 'show';
                            this.disabled = true;
                            this.cliente.slug = response.data;
                            // console.log(response.data);
                            this.alertSwal('success', 'Se ha creado nuevo Cliente');
                            setTimeout(window.location = "/clientes/"+ response.data , 2000);

                        })
                        .catch(error => {
                            this.errors = error.response.data.errors;
                            console.log(error.response.data.errors)
                        })
            },
            alertSwal: function (title, alert) {
                Swal({
                    title: alert,
                    type: title,
                    confirmButtonText: 'Aceptar',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    }
</script>
