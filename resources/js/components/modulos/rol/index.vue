<template>
  <div class="content-wrapper" style="min-height: 453px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Roles</h1>
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
              <router-link class="btn btn-info btn-sm mb-5 mt-2" :to="'/roles/crear'">
                <i class="fas fa-plus"></i> Nuevo Rol
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
                              <input type="text" name="" v-model="fillBsqRol.nombre" @keyup.enter="getRoles" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row form-group">
                            <label for="" class="col-md-4 col-form label"><i class="fas fa-user fa-user-info col-md-1"></i> Url Amigable</label>
                            <div class="col-md-8">
                              <input type="text" name="" v-model="fillBsqRol.slug" @keyup.enter="getRoles" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-md-4 offset-4 d-flex">
                        <button class="btn btn-flat btn-outline-info w-100 mr-3" @click.prevent="getRoles" v-loading.fullscreen.lock="fullscreenLoading">Buscar</button>
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
                    <div v-if="listarRolesPaginated.length">
                      <table class="table table-hover table-head-fixed text-nowrap projects">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Url Amigable</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(i, index) in listarRolesPaginated" :key="index">
                            <td v-text="i.name"></td>
                            <td v-text="i.slug"></td>
                              <router-link class="btn btn-flat btn-primary btn-sm" :to="{name: 'usuario.ver', params: {id: i.id}}"><i class="fas fa-folder"> Ver</i></router-link>
                              <router-link class="btn btn-flat btn-info btn-sm" :to="{name: 'usuario.editar', params: {id: i.id}}"><i class="fas fa-pencil-alt"> Editar</i></router-link>
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
        fillBsqRol: {
          nombre: '',
          slug: ''
        },
        Roles: [],
        pageNumber: 0,
        perPage: 5,
        fullscreenLoading: false
      }
    },
    computed:{
        //Obtener el número de páginas
        pageCount(){
          let rolesLength = this.Roles.length,
              perPage = this.perPage;
              
              return Math.ceil(rolesLength / perPage);
        },
        //Obtener registros paginados
        listarRolesPaginated(){
          let inicio = this.pageNumber * this.perPage;
          let fin = inicio + this.perPage;

          return this.Roles.slice(inicio, fin);
        },
        //
        pageList(){
          let rolesLength = this.Roles.length,
              perPage = this.perPage;
              
          let pageCount = Math.ceil(rolesLength / perPage);
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
          this.fillBsqRol.nombre = '';
          this.fillBsqRol.slug = '';
        },
        limpiarRoles(){
          this.Roles = [];
        },
        getRoles(){
          this.fullscreenLoading = true;
          var url = '/administracion/rol/getRoles';
          axios.get(url, {
            params: {
              'nombre': this.fillBsqRol.nombre,
              'slug': this.fillBsqRol.slug
            }
          }).then(response => {
            this.inicializarPaginacion();
            this.Roles = response.data;
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