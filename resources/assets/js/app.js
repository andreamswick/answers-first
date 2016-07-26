// bowserify entrypoint

// requirements
var Vue = require('vue');
var VueResource = require('vue-resource');
var VueRouter = require('vue-router');
window.$ = window.jQuery = require('jquery');
var bootstrapjs = require('bootstrap-sass');

// config
Vue.use(VueResource);
Vue.use(VueRouter);
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrf-token').getAttribute('content');

// imports
var Modal = require('vue-strap/dist/vue-strap.min').modal;
var Game = require('./components/Game.vue');
var PlayGame = require('./components/PlayGame.vue');

// app
new Vue({
    el: '#app-layout',
    components: { Modal, Game, PlayGame },
    data: {
    },
    methods: {

    }
})
