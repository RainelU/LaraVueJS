<template>
  <div class="content-wrapper" style="min-height: 453px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Crear Usuarios</h1>
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
                    <h3 class="card-title">Formulario Registrar Usuario</h3>
                    </div>
                    <div class="card-body">
                    <form action="#" role="form" enctype="multipart/form-data">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="row form-group">      
                            <label for="" class="col-md-5 col-form label" ><i class="fas fa-user fa-user-info col-md-1"></i> Primer Nombre</label>
                            <div class="col-md-7">
                                <input type="text" name="" v-model="fillCrearUsuario.primerNombre" @keyup.enter="setRegistrarUsuario" class="form-control">
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
                                <input type="text" name="" v-model="fillCrearUsuario.segundoNombre" @keyup.enter="setRegistrarUsuario" class="form-control">
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
                                <input type="text" name="" v-model="fillCrearUsuario.apellido" @keyup.enter="setRegistrarUsuario" class="form-control">
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
                                <input type="text" name="" v-model="fillCrearUsuario.usuario" @keyup.enter="setRegistrarUsuario" class="form-control">
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
                                <input type="text" name="" v-model="fillCrearUsuario.correo" @keyup.enter="setRegistrarUsuario" class="form-control">
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
                                <el-input placeholder="Escribe una Contraseña" v-model="fillCrearUsuario.password" @keyup.enter="setRegistrarUsuario" show-password></el-input>
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
                        <button class="btn btn-flat btn-outline-info w-100 mr-3" @click.prevent="setRegistrarUsuario" v-loading.fullscreen.lock="fullscreenLoading">Registrar</button>
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
            fillCrearUsuario: {
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
    computed:{

    },
    methods: {
        limpiarBusqueda(){
            this.fillCrearUsuario.primerNombre = '';
            this.fillCrearUsuario.segundoNombre = '';
            this.fillCrearUsuario.apellido = '';
            this.fillCrearUsuario.usuario = '';
            this.fillCrearUsuario.correo = '';
            this.fillCrearUsuario.password = '';
            this.fillCrearUsuario.fotografia = '';
        },
        abrirModal(){
            this.modalShow = !this.modalShow;
        },
        getFile(e){
            this.fillCrearUsuario.fotografia = e.target.files[0]
        },
        setRegistrarUsuario(){
            if(this.validarRegistrarUsuario()){
                this.modalShow = true;
                return 
            }

            this.fullscreenLoading = true;
            
            if(!this.fillCrearUsuario.fotografia || this.fillCrearUsuario.fotografia == undefined){
                this.setGuardarUsuario(0);
            }else{
                this.setRegistrarArchivo();
            }
        },
        setRegistrarArchivo(){
            this.form.append('file', this.fillCrearUsuario.fotografia);
            const config = { headers: {'Content-Type': 'multipart/form-data'} }
            let url = "/archivo/setRegistrarArchivo";

            axios.post(url, this.form, config).then(response => {
                let idFile = response.data[0].idFile;

                this.setGuardarUsuario(idFile);
            })
        },
        setGuardarUsuario(idFile){
            let url = "/administracion/usuario/setRegistrarUsuario";

            axios.post(url, {
                'primerNombre'  : this.fillCrearUsuario.primerNombre,
                'segundoNombre' : this.fillCrearUsuario.segundoNombre,
                'apellido'      : this.fillCrearUsuario.apellido,
                'usuario'       : this.fillCrearUsuario.usuario,
                'correo'        : this.fillCrearUsuario.correo,
                'password'      : this.fillCrearUsuario.password,
                'fotografia'    : idFile
            }).then(response => {
                console.log("Registro Usuario Exitosamente")
                this.fullscreenLoading = false

                this.$router.push('/usuario');
            });
        },
        validarRegistrarUsuario(){
            this.error = 0;
            this.mensajeError = [];

            if(!this.fillCrearUsuario.primerNombre){
                this.mensajeError.push("El Primer Nombre es un campo obligatorio.");
            }
            if(!this.fillCrearUsuario.apellido){
                this.mensajeError.push("El Apellido es un campo obligatorio.");
            }
            if(!this.fillCrearUsuario.usuario){
                this.mensajeError.push("El Usuario es un campo obligatorio.");
            }
            if(!this.fillCrearUsuario.correo){
                this.mensajeError.push("El Correo Electrónico es un campo obligatorio.");
            }
            if(!this.fillCrearUsuario.password){
                this.mensajeError.push("La Contraseña es un campo obligatorio.");
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