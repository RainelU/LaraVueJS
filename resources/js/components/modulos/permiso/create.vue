<template>
  <div class="content-wrapper" style="min-height: 453px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Crear Permisos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Permiso</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="content container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <router-link class="btn btn-info btn-sm mb-5 mt-2" :to="'/permiso'">
                    <i class="fas fa-arrow-left"></i> Regresar
                    </router-link>
                </div>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="card card-info w-100">
                        <div class="card-header">
                            <h3 class="card-title">Formulario Registrar Permisos</h3>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <form action="#" role="form" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row form-group">      
                                                <label for="" class="col-md-12 col-form label" ><i class="fas fa-user fa-user-info col-md-1"></i> Nombre</label>
                                                <div class="col-md-12 col-lg-12">
                                                    <input type="text" name="" v-model="fillCrearPermiso.nombre" @keyup.enter="setRegistrarPermisos" class="form-control">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row form-group">      
                                                <label for="" class="col-md-12 col-form label" >
                                                    <i class="fas fa-user fa-user-info col-md-1"></i>
                                                    Url Amigable
                                                </label>
                                                <div class="col-md-12 col-lg-12">
                                                    <input type="text" name="" v-model="fillCrearPermiso.slug" @keyup.enter="setRegistrarPermisos" class="form-control">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                        <div class="row">
                            <div class="col-md-4 offset-4">
                                <button class="btn btn-flat btn-primary" @click.prevent="setRegistrarPermisos" v-loading.fullscreen.lock="fullscreenLoading">Registrar</button>
                                <button @click.prevent="limpiarBusqueda" class="btn btn-flat btn-danger">Borrar</button>
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
            fillCrearPermiso: {
                nombre: '',
                slug: ''
            },
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
            fullscreenLoading: false,
        }
    },
    computed:{

    },
    methods: {
        limpiarBusqueda(){
            this.fillCrearPermiso.nombre = '';
            this.fillCrearPermiso.slug = '';
        },
        abrirModal(){
            this.modalShow = !this.modalShow;
        },
        setRegistrarPermisos(){
            if(this.validarResgitrarPermiso()){
                this.modalShow = true;
                return;
            }
            this.fullscreenLoading = true

            let url = "/administracion/permiso/setRegistrarPermisos";

            axios.post(url, {
                    'nombre'  : this.fillCrearPermiso.nombre,
                    'slug' : this.fillCrearPermiso.slug,
            }).then(response => {
                this.fullscreenLoading = false
                Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: "Se ha registrado correctamente el permiso.",
                  showConfirmButton: false,
                  timer: 1500
                })
                this.$router.push('/permiso');
            });
        },
        validarResgitrarPermiso(){
            this.error = 0;
            this.mensajeError = [];

            if(!this.fillCrearPermiso.nombre){
                this.mensajeError.push("El Nombre es un campo obligatorio.");
            }
            if(!this.fillCrearPermiso.slug){
                this.mensajeError.push("La Url Amigable es un campo obligatorio.");
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