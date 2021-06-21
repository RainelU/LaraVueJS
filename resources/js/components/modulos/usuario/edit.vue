<template>
  <div class="content-wrapper" style="min-height: 453px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Editar Usuarios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="content container-fluid">
        <div class="card">
            <div class="card-header">
            <div class="card-tools">
                <router-link class="btn btn-info btn-sm mb-5 mt-2" :to="'/usuario'">
                <i class="fas fa-arrow-left"></i> Regresar
                </router-link>
            </div>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                <div class="card card-info w-100">
                    <div class="card-header">
                    <h3 class="card-title">Formulario Editar Usuario</h3>
                    </div>
                    <div class="card-body">
                    <form action="#" role="form" enctype="multipart/form-data">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="row form-group">      
                            <label for="" class="col-md-5 col-form label" ><i class="fas fa-user fa-user-info col-md-1"></i> Primer Nombre</label>
                            <div class="col-md-7">
                                <input type="text" name="" v-model="fillEditarUsuario.primerNombre" @keyup.enter="setEditarUsuario" class="form-control">
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">      
                            <label for="" class="col-md-5 col-form label" >
                                <i class="fas fa-user fa-user-info col-md-1"></i>
                                Segundo Nombre
                            </label>
                            <div class="col-md-7">
                                <input type="text" name="" v-model="fillEditarUsuario.segundoNombre" @keyup.enter="setEditarUsuario" class="form-control">
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">      
                            <label for="" class="col-md-4 col-form label" >
                                <i class="fas fa-user fa-user-info col-md-1"></i> 
                                Apellido
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="" v-model="fillEditarUsuario.apellido" @keyup.enter="setEditarUsuario" class="form-control">
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">      
                            <label for="" class="col-md-4 col-form label" >
                                <i class="fas fa-user fa-user-info col-md-1"></i> 
                                Usuario
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="" v-model="fillEditarUsuario.usuario" @keyup.enter="setEditarUsuario" class="form-control">
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">      
                            <label for="" class="col-md-5 col-form label" >
                                <i class="fas fa-user fa-user-info col-md-1"></i> 
                                Correo Electronico
                            </label>
                            <div class="col-md-7">
                                <input type="text" name="" v-model="fillEditarUsuario.correo" @keyup.enter="setEditarUsuario" class="form-control">
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">      
                            <label for="" class="col-md-4 col-form label" >
                                <i class="fas fa-user fa-user-info col-md-1"></i> 
                                Contraseña
                            </label>
                            <div class="col-md-8">
                                <el-input placeholder="Escribe una Contraseña" v-model="fillEditarUsuario.password" @keyup.enter="setEditarUsuario" show-password></el-input>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">      
                            <label for="" class="col-md-4 col-form label" >
                                <i class="fas fa-user fa-user-info col-md-1"></i> 
                                Fotografía
                            </label>
                            <div class="col-md-8">
                                <input type="file" name="" @change="getFile">
                            </div>
                            </div>
                        </div>
                        </div>
                    </form>
                    </div>
                    <div class="card-footer">
                    <div class="row">
                        <div class="col-md-4 offset-4 d-flex">
                        <button class="btn btn-flat btn-outline-info w-100 mr-3" @click.prevent="setEditarUsuario" v-loading.fullscreen.lock="fullscreenLoading">Registrar</button>
                        <button @click.prevent="limpiarBusqueda" class="btn btn-flat btn-outline-dark w-100">Borrar</button>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
      </div>

      <div class="modal fade" :class="{show: modalShow}" :style="modalShow ? mostrarModal : ocultarModal">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Sistema Laravel y VueJS</h5>
                      <button class="close" @click="abrirModal"></button>
                  </div>
                  <div class="modal-body" v-for="(error, index) in mensajeError" :key="index">
                      <div v-text="error" class="callout callout-danger"></div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-secondary" @click="abrirModal">Cerrar</button>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <!-- /.content-header -->
  </div>
</template>

<script>
export default {
    data(){
        return{
            fillEditarUsuario: {
                idUsuario: this.$attrs.id,
                primerNombre: '',
                segundoNombre: '',
                apellido: '',
                usuario: '',
                correo: '',
                password: '',
                fotografia: ''  
            },
            form: new FormData,
            modalShow: false,
            mostrarModal: {
                display: 'block',
                background: '#0000006b'
            },
            ocultarModal: {
                display: 'none'
            },
            error: 0,
            mensajeError: [],
            fullscreenLoading: false
        }
    },
    mounted(){
        this.getUsuarioById();
    },
    methods: {
        getUsuarioById(){
            this.fullscreenLoading = true;
            let url = "/administracion/usuario/getUsuarios";

            axios.get(url, {params: {'idUsuario': this.fillEditarUsuario.idUsuario}})
                .then(response => {
                    this.fillEditarUsuario.primerNombre = response.data[0].firstname;
                    this.fillEditarUsuario.segundoNombre = response.data[0].secondname;
                    this.fillEditarUsuario.apellido = response.data[0].lastname;
                    this.fillEditarUsuario.usuario = response.data[0].username;
                    this.fillEditarUsuario.correo = response.data[0].email;
                    this.fullscreenLoading = false;
                })
        },
        limpiarBusqueda(){
            this.fillEditarUsuario.primerNombre = '';
            this.fillEditarUsuario.segundoNombre = '';
            this.fillEditarUsuario.apellido = '';
            this.fillEditarUsuario.usuario = '';
            this.fillEditarUsuario.correo = '';
            this.fillEditarUsuario.password = '';
            this.fillEditarUsuario.fotografia = '';
        },
        abrirModal(){
            this.modalShow = !this.modalShow;
        },
        getFile(e){
            this.fillEditarUsuario.fotografia = e.target.files[0]
        },
        setEditarUsuario(){
            if(this.validarRegistrarUsuario()){
                this.modalShow = true;
                return 
            }

            this.fullscreenLoading = true;
            
            if(!this.fillEditarUsuario.fotografia || this.fillEditarUsuario.fotografia == undefined){
                this.setGuardarUsuario(0);
            }else{
                this.setRegistrarArchivo();
            }
        },
        setRegistrarArchivo(){
            this.form.append('file', this.fillEditarUsuario.fotografia);
            const config = { headers: {'Content-Type': 'multipart/form-data'} }
            let url = "/archivo/setRegistrarArchivo";

            axios.post(url, this.form, config).then(response => {
                let idFile = response.data[0].idFile;

                this.setGuardarUsuario(idFile);
            })
        },
        setGuardarUsuario(idFile){
            let url = "/administracion/usuario/setEditarUsuario";

            axios.post(url, {   
                    'idUsuario'     : this.fillEditarUsuario.idUsuario,
                    'primerNombre'  : this.fillEditarUsuario.primerNombre,
                    'segundoNombre' : this.fillEditarUsuario.segundoNombre,
                    'apellido'      : this.fillEditarUsuario.apellido,
                    'usuario'       : this.fillEditarUsuario.usuario,
                    'correo'        : this.fillEditarUsuario.correo,
                    'password'      : this.fillEditarUsuario.password,
                    'fotografia'    : idFile
            }).then(response => {
                this.fullscreenLoading = false;
                Swal.fire({
                    icon: 'success',
                    title: 'Se ha actualizado correctamente.',
                    showConfirmButton: false,
                    timer: 1500
                })
            });
        },
        validarRegistrarUsuario(){
            this.error = 0;
            this.mensajeError = [];

            if(!this.fillEditarUsuario.primerNombre){
                this.mensajeError.push("El Primer Nombre es un campo obligatorio.");
            }
            if(!this.fillEditarUsuario.apellido){
                this.mensajeError.push("El Apellido es un campo obligatorio.");
            }
            if(!this.fillEditarUsuario.usuario){
                this.mensajeError.push("El Usuario es un campo obligatorio.");
            }
            if(!this.fillEditarUsuario.correo){
                this.mensajeError.push("El Correo Electrónico es un campo obligatorio.");
            }

            if(this.mensajeError.length){
                this.error = 1;
            }

            return this.error;
        },

    }
}
</script>

<style>

</style>