<template>
  <div>
    <NavBar :ruta="ruta"></NavBar>

    <!-- Main Sidebar Container -->
    <SideNavBar :ruta="ruta"></SideNavBar>

    <!-- Content Wrapper. Contains page content -->
    <transition name="slide-fade" mode="out-in">
      <router-view></router-view>
    </transition>
    <!-- /.content-wrapper -->
    
    <Footer :ruta="ruta"></Footer>
  </div>
</template>

<script>
  import NavBar from "./plantilla/Navbar";
  import SideNavBar from "./plantilla/SideNavBar";
  import Footer from "./plantilla/Footer";

  export default{
    props: ['ruta'],
    components: {
      NavBar,
      SideNavBar,
      Footer
    }
  }
</script>