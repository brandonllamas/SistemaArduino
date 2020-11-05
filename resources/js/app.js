import Vuetify from 'vuetify'
import router from './router'
require('./bootstrap');

window.Vue = require('vue');

Vue.use(Vuetify);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('dashboard', require('./components/DashboardAdmin.vue').default);
Vue.component('login', require('./components/login.vue').default);
const app = new Vue({
    router,
    el: '#app',
    vuetify: new Vuetify(),

});
