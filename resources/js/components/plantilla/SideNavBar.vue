<template>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link w-100">
      <img :src='ruta + "/img/AdminLTELogo.png"' class="img-circle elevation-2" style="width:30px;" alt="">
        LaraVueJS
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img :src='ruta + "/img/avatar.png"' class="img-circle elevation-2" alt="">
        </div>
        <div class="info">
          <a href="#" class="d-block">Rainel Urdaneta</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            
            <router-link :to="'/'" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </router-link>
          </li>
          <li class="nav-header">OPERACIONES</li>
          <li class="nav-item">
            <router-link :to="'/pedido'" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Pedidos
                <span class="badge badge-info right">2</span>
              </p>
            </router-link>
          </li>
          <li class="nav-item">
           <router-link :to="'/cliente'" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Clientes
              </p>
           </router-link>
          </li>
          <li class="nav-header">CONFIGURACION</li>
          <li class="nav-item">
            <router-link :to="'/categoria'" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>Categoria</p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link :to="'/producto'" class="nav-link">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>Productos</p>
            </router-link>
          </li>
          <li class="nav-header">ADMINISTRACION</li>
          <li class="nav-item">
            <router-link :to="'/usuario'" class="nav-link">
              <i class="nav-icon far fa-user text-warning"></i>
              <p class="text">Usuarios</p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link :to="'/roles'" class="nav-link">
              <i class="nav-icon fas fa-unlock-alt text-warning"></i>
              <p>Roles</p>
            </router-link>
          </li>
          <li class="nav-item">
           <router-link :to="'/permiso'" class="nav-link">
              <i class="nav-icon fas fa-key text-warning"></i>
              <p>Permisos</p>
            </router-link>
          </li>
          <li class="nav-header">REPORTES</li>
          <li class="nav-item">
            <router-link :to="'/reportes/pedido'" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>Pedidos</p>
            </router-link>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>

<script>
export default {
    props: ['ruta']
}
</script>

<style>

</style>