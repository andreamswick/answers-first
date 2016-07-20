// bowserify entrypoint

// requirements
var Vue = require('vue');
var VueResource = require('vue-resource');

// config
Vue.use(VueResource);
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrf-token').getAttribute('content');

// imports
var Modal = require('vue-strap/dist/vue-strap.min').modal;

// app
new Vue({
    el: '#app-layout',
    components: { Modal },
    data: {
        showModal: false,
        question: '',
        answer: '',
        name: '',
        questions: {
            0: {
                title: '',
                200: {},
                400: {},
                600: {},
                800: {},
                1000: {},
            },
            1: {
                title: '',
                200: {},
                400: {},
                600: {},
                800: {},
                1000: {},
            },
            2: {
                title: '',
                200: {},
                400: {},
                600: {},
                800: {},
                1000: {},
            },
            3: {
                title: '',
                200: {},
                400: {},
                600: {},
                800: {},
                1000: {},
            },
            4: {
                title: '',
                200: {},
                400: {},
                600: {},
                800: {},
                1000: {},
            },
            5: {
                title: '',
                200: {},
                400: {},
                600: {},
                800: {},
                1000: {},
            }
        },
        section: '',
        amount: ''
    },
    methods: {
        showQuestion(section, amount) {
            this.section = section;
            this.amount = amount;
            if(this.questions[this.section][this.amount]['question'] !== typeof undefined) {
                this.question = this.questions[this.section][this.amount]['question'];
                this.answer = this.questions[this.section][this.amount]['answer'];
            }
            this.showModal = true;
        },
        saveQuestion() {
            console.log(this.question, this.answer);
            this.questions[this.section][this.amount] = {'question': this.question, 'answer': this.answer};
            this.question = '';
            this.answer = '';
            this.showModal = false;
        },
        saveGame() {
            this.$http.post('/game', {
                name: this.name,
                questions: this.questions
            }).then((response) => {
                console.log('good', response);
            }, (response) => {
                console.log('bad', response);
            })
        }
    }
})
