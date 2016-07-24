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

// app
new Vue({
    el: '#app-layout',
    components: { Modal, Game },
    data: {
        // showModal: false,
        // question: '',
        // answer: '',
        // name: '',
        // questions: {
        //     0: {
        //         title: '',
        //         200: {},
        //         400: {},
        //         600: {},
        //         800: {},
        //         1000: {},
        //     },
        //     1: {
        //         title: '',
        //         200: {},
        //         400: {},
        //         600: {},
        //         800: {},
        //         1000: {},
        //     },
        //     2: {
        //         title: '',
        //         200: {},
        //         400: {},
        //         600: {},
        //         800: {},
        //         1000: {},
        //     },
        //     3: {
        //         title: '',
        //         200: {},
        //         400: {},
        //         600: {},
        //         800: {},
        //         1000: {},
        //     },
        //     4: {
        //         title: '',
        //         200: {},
        //         400: {},
        //         600: {},
        //         800: {},
        //         1000: {},
        //     },
        //     5: {
        //         title: '',
        //         200: {},
        //         400: {},
        //         600: {},
        //         800: {},
        //         1000: {},
        //     }
        // },
        // section: '',
        // amount: ''
    },
    methods: {
        showQuestion(section, amount) {
            this.section = section;
            this.amount = amount;
            if(this.questions[this.section][this.amount]['question'] !== typeof undefined) {
                this.question = this.questions[this.section][this.amount]['question'];
                this.answer = this.questions[this.section][this.amount]['answer'];
            }
            $('#questionModal').modal('show');
        },
        // saveQuestion() {
        //     console.log(this.question, this.answer);
        //     this.questions[this.section][this.amount] = {'question': this.question, 'answer': this.answer};
        //     this.question = '';
        //     this.answer = '';
        //     $('#questionModal').modal('hide');
        // },
        // saveGame() {
        //     this.$http.post('/game', {
        //         name: this.name,
        //         questions: this.questions
        //     }).then((response) => {
        //         console.log('good', response);
        //     }, (response) => {
        //         console.log('bad', response);
        //     })
        // }
    }
})
