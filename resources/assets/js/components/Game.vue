<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">Edit Game</div>

            <div class="panel-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" v-model="name">
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th class="form-group" v-for="n in sections">
                            <label>Section {{ n+1 }} Title</label>
                            <input type="text" class="form-control" name="questions[{{ n }}][name]"
                                   v-model="questions[n].title">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="amount in amounts">
                        <td v-for="n in sections">
                            <button type="button" class="btn btn-default btn-block {{ questions[n][amount].length === 0 ? '' : 'btn-fill' }}"
                                    @click="showQuestion(n, amount)">Add ${{ amount }} Question
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="panel-footer">
                <button type="submit" class="btn btn-primary" @click.prevent="saveGame">Save Game</button>
            </div>
        </div>

        <div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="questionModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Section {{ section+1 }}: ${{ amount }} Question</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Answer</label>
                            <input type="text" class="form-control" name="answer" v-model="answer">
                        </div>
                        <div class="form-group">
                            <label for="">Question</label>
                            <input type="text" class="form-control" name="question" v-model="question">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="saveQuestion">Save changes</button>
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
                sections: 6,
                amounts: [200, 400, 600, 800, 1000],
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
            }
        },
        created() {
            if (this.game !== '') {
                this.game = JSON.parse(this.game);
                this.name = this.game.name;
                this.questions = this.game.questions;
            }
        },
        methods: {
            showQuestion(section, amount) {
                this.section = section;
                this.amount = amount;
                if (this.questions[this.section][this.amount]['question'] !== typeof undefined) {
                    this.question = this.questions[this.section][this.amount]['question'];
                    this.answer = this.questions[this.section][this.amount]['answer'];
                }
                $('#questionModal').modal('show');
            },
            saveQuestion() {
                this.questions[this.section][this.amount] = {'question': this.question, 'answer': this.answer};
                this.question = '';
                this.answer = '';
                $('#questionModal').modal('hide');
            },
            saveGame() {
                if (this.game !== '') {
                    this.$http.patch('/game/' + this.game.id, {
                        name: this.name,
                        questions: this.questions
                    }).then((response) => {
                        window.location.href = "/";
                    }, (response) => {
                    });
                }
                else {
                    this.$http.post('/game', {
                        name: this.name,
                        questions: this.questions
                    }).then((response) => {
                        window.location.href = "/";
                    }, (response) => {
                    });
                }

            }
        }
    }
</script>
