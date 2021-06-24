<template>
  <div class="content-wrapper" style="min-height: 453px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Editar Roles</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Roles</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="content container-fluid">
        <div class="card">
            <div class="card-header">
            <div class="card-tools">
                <router-link class="btn btn-info btn-sm mb-5 mt-2" :to="'/roles'">
                <i class="fas fa-arrow-left"></i> Regresar
                </router-link>
            </div>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card card-info w-100">
                                <div class="card-header">
                                    <h3 class="card-title">Formulario Editar Roles</h3>
                                </div>
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <form action="#" role="form" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row form-group">      
                                                        <label for="" class="col-md-5 col-form label" ><i class="fas fa-user fa-user-info col-md-1"></i> Nombre</label>
                                                        <div class="col-md-7">
                                                            <input type="text" name="" v-model="fillEditarRol.nombre" @keyup.enter="setEditarRolPermisos" class="form-control">
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row form-group">      
                                                        <label for="" class="col-md-5 col-form label" >
                                                            <i class="fas fa-user fa-user-info col-md-1"></i>
                                                            Url Amigable
                                                        </label>
                                                        <div class="col-md-7">
                                                            <input type="text" name="" v-model="fillEditarRol.slug" @keyup.enter="setEditarRolPermisos" class="form-control">
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
                                    <div class="col-md-6">
                                        <button class="btn btn-flat btn-primary w-100 mr-3" @click.prevent="setEditarRolPermisos" v-loading.fullscreen.lock="fullscreenLoading">Editar</button>
                                    </div>
                                    <div class="col-md-6">
                                       <button @click.prevent="limpiarBusqueda" class="btn btn-flat btn-danger w-100">Borrar</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card card-info w-100">
                                <div class="card-header">
                                    <h3 class="card-title">Listar Permisos</h3>
                                </div>
                                <div class="card-body table-responsive">
                                    <div v-if="PermisosFilter.length">
                                        <div class="ScrollTable">
                                            <table class="table table-hover table-head-fixed text-nowrap projects">
                                                <thead>
                                                <tr>
                                                    <th>Acción</th>
                                                    <th>Nombres</th>
                                                    <th>Url Amigable</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="(i, index) in PermisosFilter" :key="index" @click.prevent="marcarFila(index)">
                                                    <td>
                                                        <!-- Irá el Checkbox Para Seleccionar los permisos que se le asignaran al rol -->
                                                        <el-checkbox v-model="i.checked"></el-checkbox>
                                                    </td>
                                                    <td v-text="i.name"></td>
                                                    <td v-text="i.slug"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div v-else>
                                        <div class="callout callout-info text-center">No se han encontrado Resultados...</div>
                                    </div>
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
            fillEditarRol: {
                idRol: this.$attrs.id,
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
            Permisos: [],
            PermisosFilter: []
        }
    },
    computed:{

    },
    mounted(){
        this.getRoles();
        this.getListarPermisosByRol();
    },
    methods: {
        marcarFila(index){
            this.PermisosFilter[index].checked = !this.PermisosFilter[index].checked
        },
        getListarPermisosByRol(){
            let url = "/administracion/rol/getListarPermisosByRol"
            axios.get(url, {
                params: {
                    'idRol': this.fillEditarRol.idRol
                }
            }).then(response => { 
                this.Permisos = response.data
                this.filterPermisosByRol();
            })
        },
        getRoles(){
          this.fullscreenLoading = true;
          var url = '/administracion/rol/getRoles';
          axios.get(url, {
            params: {
              'idRol': this.fillEditarRol.idRol
            }
          }).then(response => {
            this.fillEditarRol.nombre = response.data[0].name;
            this.fillEditarRol.slug = response.data[0].slug;
            this.fullscreenLoading = false;
          })
        },
        filterPermisosByRol(){
            let me = this;

            me.Permisos.map(function(x, y){
                me.PermisosFilter.push({
                    'id': x.id,
                    'name': x.name,
                    'slug': x.slug,
                    'checked': (x.checked == 1) ? true : false 
                })
            });
        },
        limpiarBusqueda(){
            this.fillEditarRol.nombre = '';
            this.fillEditarRol.slug = '';
        },
        abrirModal(){
            this.modalShow = !this.modalShow;
        },
        setEditarRolPermisos(){
            if(this.validarEditarRolPermisos()){
                this.modalShow = true;
                return;
            }
            this.fullscreenLoading = true

            let url = "/administracion/rol/setEditarRolPermisos";

            axios.post(url, {
                    'idRol': this.fillEditarRol.idRol,
                    'nombre'  : this.fillEditarRol.nombre,
                    'slug' : this.fillEditarRol.slug,
                    'PermisosFilter' : this.PermisosFilter
            }).then(response => {
                this.fullscreenLoading = false
                Swal.fire({
                    icon: 'success',
                    title: 'Se ha editado el rol correctamente.',
                    showConfirmButton: false,
                    timer: 1500
                })
            });
        },
        validarEditarRolPermisos(){
            this.error = 0;
            this.mensajeError = [];

            if(!this.fillEditarRol.nombre){
                this.mensajeError.push("El Nombre es un campo obligatorio.");
            }
            if(!this.fillEditarRol.slug){
                this.mensajeError.push("La Url Amigable es un campo obligatorio.");
            }

            let counter = 0;
            this.PermisosFilter.map(function(x,y){
                if(x.checked == true){
                    counter++;
                }
            })
            if(counter == 0){
                this.mensajeError.push('Debe seleccionar al menos un permiso.');
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