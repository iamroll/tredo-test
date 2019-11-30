require('./bootstrap')

import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import router from './router'
import store from './store'
import './modules/main'
import './modules/employees'
import './modules/departments'

Vue.use(BootstrapVue)

new Vue({
    el: '#app',
    router,
    store
})
