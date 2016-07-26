<template>
    <div>
        <h1 class="text-center">{{ game.name }}</h1>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center" v-for="section in game.questions">
                    <h4>{{ section.title }}</h4>
                </th>
            </tr>
            </thead>
            <tbody>

            <tr v-for="amount in amounts">
                <td v-for="n in sections">
                    <button type="button" class="btn btn-primary btn-block {{ questions[n][amount] === true ? 'btn-fill' : '' }}"
                            @click="showQuestion(n, amount)">${{ amount }}
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

        <div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="questionModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Section {{ section+1 }}: ${{ amount }} Question</h4>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center page-header">{{ answer }}</h3>

                        <p class="text-center" v-show="isQuestionShown">{{ question }}</p>
                        <p class="text-center"><button type="button" class="btn btn-default" @click="isQuestionShown = true"
                                v-show="!isQuestionShown">Show Question
                        </button></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="saveQuestion">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'game'
        ],
        data() {
            return {
                sections: 5,
                amounts: [200, 400, 600, 800, 1000],
                question: '',
                answer: '',
                section: '',
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
                amount: '',
                isQuestionShown: false,
            }
        },
        created() {
            if (this.game !== '') {
                this.game = JSON.parse(this.game);
            }
        },
        methods: {
            showQuestion(section, amount) {
                this.section = section;
                this.amount = amount;
                if (this.game.questions[this.section][this.amount]['question'] !== typeof undefined) {
                    this.question = this.game.questions[this.section][this.amount]['question'];
                    this.answer = this.game.questions[this.section][this.amount]['answer'];
                }
                $('#questionModal').modal('show');
            },
            saveQuestion() {
                this.questions[this.section][this.amount] = true;
                this.question = '';
                this.answer = '';
                this.isQuestionShown = false;
                $('#questionModal').modal('hide');
            },
        }
    }
</script>
