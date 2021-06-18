<template>
  <div class="content-wrapper" style="min-height: 453px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Usuarios</h1>
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
              <router-link class="btn btn-info btn-sm mb-5 mt-2" :to="'/usuario/crear'">
                <i class="fas fa-plus"></i> Nuevo Usuario
              </router-link>
            </div>
            <div class="card-body">
              <div class="container-fluid">
                <div class="card card-info w-100">
                  <div class="card-header">
                    <h3 class="card-title">Criterios de Búsqueda</h3>
                  </div>
                  <div class="card-body">
                    <form action="#" role="form">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="row form-group">
                            
                            <label for="" class="col-md-4 col-form label" ><i class="fas fa-user fa-user-info col-md-1"></i> Nombre</label>
                            <div class="col-md-8">
                              <input type="text" name="" v-model="fillBsqUsuario.nombre" @keyup.enter="getUsuarios" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row form-group">
                            <label for="" class="col-md-4 col-form label"><i class="fas fa-user fa-user-info col-md-1"></i> Usuario</label>
                            <div class="col-md-8">
                              <input type="text" name="" v-model="fillBsqUsuario.usuario" @keyup.enter="getUsuarios" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row form-group">
                            <label for="" class="col-md-4 col-form label"><i class="fas fa-at fa-user-info col-md-1"></i> Correo</label>
                            <div class="col-md-8">
                              <input type="text" name="" v-model="fillBsqUsuario.correo" @keyup.enter="getUsuarios" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row form-group">
                            <label for="" class="col-md-4 col-form label"><i class="fas fa-signal mr-1 fa-user-info col-md-1"></i> Estado</label>
                            <div class="col-md-8">
                              <el-select class="w-100" v-model="fillBsqUsuario.estado" @keyup.enter="getUsuarios" placeholder="Seleccionar Estado" clearable>
                                <el-option
                                  v-for="i in Estado"
                                  :key="i.value"
                                  :label="i.label"
                                  :value="i.value">
                                </el-option>
                              </el-select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-md-4 offset-4 d-flex">
                        <button class="btn btn-flat btn-outline-info w-100 mr-3" @click.prevent="getUsuarios" v-loading.fullscreen.lock="fullscreenLoading">Buscar</button>
                        <button @click.prevent="limpiarBusqueda" class="btn btn-flat btn-outline-dark w-100">Borrar</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Bandeja de Resultados</h3>
                  </div>
                  <div class="card-body table-responsive">
                    <div v-if="listarUsuariosPaginated.length">
                      <table class="table table-hover table-head-fixed text-nowrap projects">
                        <thead>
                          <tr>
                            <th>Fotografía</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(i, index) in listarUsuariosPaginated" :key="index">
                            <td v-if="!i.profile_image">
                              <li class="li-img-bandeja">
                                <img src="/img/avatar.png" class="img img-bandeja" alt="">
                              </li>
                            </td>
                            <td v-else>
                              <li class="li-img-bandeja">
                                <img :src="i.profile_image" class="img img-bandeja" alt="">
                              </li>
                            </td>
                            <td v-text="i.firstname"></td>
                            <td v-text="i.username"></td>
                            <td v-text="i.email"></td>
                            <td>
                              <template v-if='i.state == "A"'>
                                <span class="badge badge-success" v-text="i.state_alias">
                                  
                                </span> 
                              </template>
                              <template v-else>
                                <span class="badge badge-danger" v-text="i.state_alias">
                                  
                                </span> 
                              </template>
                            </td>
                            <td>
                              <router-link class="btn btn-flat btn-primary btn-sm" :to="'/'"><i class="fas fa-folder"> Ver</i></router-link>
                              <template v-if="i.state == 'A'">
                                <router-link class="btn btn-flat btn-info btn-sm" :to="{name: 'usuario.editar', params: {id: i.id}}"><i class="fas fa-pencil-alt"> Editar</i></router-link>
                                <router-link class="btn btn-flat btn-success btn-sm" :to="'/'"><i class="fas fa-key"> Permiso</i></router-link>
                                <router-link class="btn btn-flat btn-danger btn-sm" :to="'/'"><i class="fas fa-trash"> Desactivar</i></router-link>
                              </template>
                              <template v-else>
                                <router-link class="btn btn-flat btn-success btn-sm" :to="'/'"><i class="fas fa-check"> Activar</i></router-link>
                              </template>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div v-else>
                        <div class="callout callout-info text-center">No se han encontrado Resultados...</div>
                    </div>
                  </div>
                  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                      <li class="page-item" v-if="pageNumber > 0">
                        <a href="#" class="page-link" @click.prevent="prevPage">Prev</a>
                      </li>
                      <li class="page-item" v-for="(page, index) in pageList" :key="index" :class="page != pageNumber ? '' : 'active'">
                        <a href="#" class="page-link" @click.prevent="selectPage(page)">{{ page + 1 }}</a>
                      </li>
                      <li class="page-item" v-if="pageNumber < pageCount - 1">
                        <a href="#" class="page-link" @click.prevent="nextPage">Next</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
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
        fillBsqUsuario: {
          nombre: '',
          usuario: '',
          correo: '',
          estado: '' 
        },
        Usuario: [],
        Estado: [{value: 'A', label: 'Activo'}, {value: 'I', label: 'Inactivo'}],
        pageNumber: 0,
        perPage: 5,
        fullscreenLoading: false
      }
    },
    computed:{
        //Obtener el número de páginas
        pageCount(){
          let usuarioLength = this.Usuario.length,
              perPage = this.perPage;
              
              return Math.ceil(usuarioLength / perPage);
        },
        //Obtener registros paginados
        listarUsuariosPaginated(){
          let inicio = this.pageNumber * this.perPage;
          let fin = inicio + this.perPage;

          return this.Usuario.slice(inicio, fin);
        },
        //
        pageList(){
          let usuarioLength = this.Usuario.length,
              perPage = this.perPage;
              
          let pageCount = Math.ceil(usuarioLength / perPage);
          let count = 0,
              pagesArray = [];

              while(count < pageCount){
                pagesArray.push(count);
                count++;
              }
            return pagesArray;
        }
    },
    methods: {
        limpiarBusqueda(){
          this.fillBsqUsuario.nombre = '';
          this.fillBsqUsuario.correo = '';
          this.fillBsqUsuario.usuario = '';
          this.fillBsqUsuario.estado = '';
        },
        limpiarUsuarios(){
          this.Usuario = [];
        },
        getUsuarios(){
          this.fullscreenLoading = true;
          var url = '/administracion/usuario/getUsuarios';
          axios.get(url, {
            params: {
              'nombre': this.fillBsqUsuario.nombre,
              'usuario': this.fillBsqUsuario.usuario,
              'correo': this.fillBsqUsuario.correo,
              'estado': this.fillBsqUsuario.estado
            }
          }).then(response => {
            this.inicializarPaginacion();
            this.Usuario = response.data;
            this.fullscreenLoading = false;
          })
        },
        nextPage(){
          this.pageNumber++;
        },
        prevPage(){
          this.pageNumber--;
        },
        selectPage(page){
          this.pageNumber = page;
        },
        inicializarPaginacion(){
          this.pageNumber = 0;
        }
    }
}
</script>

<style>

</style>