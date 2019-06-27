
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Vue.component('slide', require('./components/IntroSlide.vue'));

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import slide from './components/IntroSlide.vue'
import service from './components/service.vue'
import skill from './components/skill.vue'
import description from './components/description.vue'
import message from './components/message.vue'
import about from './components/about_us.vue'
import client from './components/client.vue'
import team from './components/team.vue'
import produk from './components/produk.vue'
import web from './components/nameweb.vue'

Vue.component('pagination', require('laravel-vue-pagination'));
import VModal from 'vue-js-modal'
Vue.use(VModal)


const app = new Vue({
    el: '#app',
    components :{
        slide, service, skill, description, message, about ,client, team, produk, web
    }
});
