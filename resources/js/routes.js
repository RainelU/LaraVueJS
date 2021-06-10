import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

export default new VueRouter({
    routes: [
        {path: '/', component: require('./components/modulos/dashboard/index').default},
        {path: '/pedido', component: require('./components/modulos/pedido/index').default},
        {path: '/categoria', component: require('./components/modulos/categoria/index').default},
        {path: '/cliente', component: require('./components/modulos/cliente/index').default},
        {path: '/permiso', component: require('./components/modulos/permiso/index').default},
        {path: '/producto', component: require('./components/modulos/producto/index').default},
        {path: '/reporte', component: require('./components/modulos/reporte/index').default},
        {path: '/roles', component: require('./components/modulos/rol/index').default}
    ],
    mode: 'history'
})