/*
|-------------------------------------------------------------------------------
| routes.js
|-------------------------------------------------------------------------------
| Contains all of the routes for the application
*/

/*
    Imports Vue and VueRouter to extend with the routes.
*/
import Vue from 'vue'
import VueRouter from 'vue-router'

/*
    Extends Vue to use Vue Router
*/
Vue.use( VueRouter )

/*
    Makes a new VueRouter that we will use to run all of the routes
    for the app.
*/
export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'layout',
            component: Vue.component( 'Layout', require( './pages/Layout.vue' ) ),
            children: [
                {
                    path: 'home',
                    name: 'home',
                    component: Vue.component( 'Home', require( './pages/Home.vue' ) )
                },
                {
                    path: 'complexes',
                    name: 'complexes',
                    component: Vue.component( 'Complexes', require( './pages/Complexes.vue' ) ),
                },
                {
                    path: 'complexes/new',
                    name: 'newcomplex',
                    component: Vue.component( 'NewComplex', require( './pages/NewComplex.vue' ) )
                },
                {
                    path: 'complexes/:id',
                    name: 'complex',
                    component: Vue.component( 'Complex', require( './pages/Complex.vue' ) )
                }
            ]
        }
    ]
});