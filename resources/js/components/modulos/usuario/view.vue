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
        <div class="row">
            <div class="col-md-4">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    <template v-if="!this.fillVerUsuario.rutaFotografia">
                        <img class="profile-user-img img-fluid img-circle img-max-height" src="/img/avatar.png" alt="User profile picture">
                    </template>
                    <template v-else>
                        <img :src="this.fillVerUsuario.rutaFotografia" class="img-max-height profile-user-img img-fluid img-circle">
                    </template>
                </div>

                <h3 class="profile-username text-center" v-text="this.fillVerUsuario.fullname"></h3>

                <p class="text-muted text-center">Vendedor</p>

                <a href="#" class="btn btn-primary br-50 btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Más info...</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">

                    <strong><i class="fas fa-user mr-1"></i> Nombre Completo</strong>

                    <p class="text-muted" v-text="this.fillVerUsuario.fullname"></p>

                    <hr>
                    <strong><i class="fas fa-book mr-1"></i> Correo Electronico</strong>

                    <p class="text-muted" v-text="this.fillVerUsuario.correo"></p>

                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills position-reverse">
                  <router-link class="btn btn-info btn-sm mb-2 mt-2" :to="'/usuario'">
                    <i class="fas fa-arrow-left"></i> Regresar
                  </router-link>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Primer Nombre</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" v-model="fillEditarUsuario.primerNombre" @keyup.enter="setEditarUsuario">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Segundo Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" name="" v-model="fillEditarUsuario.segundoNombre" @keyup.enter="setEditarUsuario" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Apellido</label>
                        <div class="col-sm-10">
                          <input type="text" name="" v-model="fillEditarUsuario.apellido" @keyup.enter="setEditarUsuario" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Usuario</label>
                        <div class="col-sm-10">
                          <input type="text" name="" v-model="fillEditarUsuario.usuario" @keyup.enter="setEditarUsuario" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Correo Electronico</label>
                        <div class="col-sm-10">
                          <input type="text" name="" v-model="fillEditarUsuario.correo" @keyup.enter="setEditarUsuario" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Contraseña</label>
                        <div class="col-sm-10">
                           <el-input placeholder="Escribe una Contraseña" v-model="fillEditarUsuario.password" @keyup.enter="setEditarUsuario" show-password></el-input>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Imágen de Perfil</label>
                        <div class="col-sm-10">
                           <input type="file" name="" @change="getFile">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button class="btn btn-flat btn-primary br-50 w-100 mr-3" @click.prevent="setEditarUsuario" v-loading.fullscreen.lock="fullscreenLoading">Enviar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
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
            fillVerUsuario: {
                fullname: '',
                primerNombre: '',
                segundoNombre: '',
                apellido: '',
                usuario: '',
                correo: '',
                password: '',
                rutaFotografia: ''  
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
                    this.getUsuarioData(response.data[0]);
                    this.getUsuarioVer(response.data[0]);
                    this.fullscreenLoading = false;
                    console.log(response.data)
                })
        },
        getUsuarioData(data){
            this.fillEditarUsuario.primerNombre = data.firstname;
            this.fillEditarUsuario.segundoNombre = data.secondname;
            this.fillEditarUsuario.apellido = data.lastname;
            this.fillEditarUsuario.usuario = data.username;
            this.fillEditarUsuario.correo = data.email;
        },
        getUsuarioVer(data){
            this.fillVerUsuario.fullname = data.fullname;
            this.fillVerUsuario.primerNombre = data.firstname;
            this.fillVerUsuario.segundoNombre = data.secondname;
            this.fillVerUsuario.apellido = data.lastname;
            this.fillVerUsuario.usuario = data.username;
            this.fillVerUsuario.correo = data.email;
            this.fillVerUsuario.rutaFotografia = data.profile_image;
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
                this.getUsuarioById();
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
        }
    }
}
</script>

<style>

</style>