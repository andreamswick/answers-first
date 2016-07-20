@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Game</div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" v-model="name">
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="form-group">
                                    <label for="section1">Section 1 Title</label>
                                    <input type="text" class="form-control" name="questions[0][name]" v-model="questions[0].title">
                                </th>
                                <th class="form-group">
                                    <label for="section2">Section 2 Title</label>
                                    <input type="text" class="form-control" name="questions[1][name]" v-model="questions[1].title">
                                </th>
                                <th class="form-group">
                                    <label for="section3">Section 3 Title</label>
                                    <input type="text" class="form-control" name="questions[2][name]" v-model="questions[2].title">
                                </th>
                                <th class="form-group">
                                    <label for="section4">Section 4 Title</label>
                                    <input type="text" class="form-control" name="questions[3][name]" v-model="questions[3].title">
                                </th>
                                <th class="form-group">
                                    <label for="section5">Section 5 Title</label>
                                    <input type="text" class="form-control" name="questions[4][name]" v-model="questions[4].title">
                                </th>
                                <th class="form-group">
                                    <label for="section6">Section 6 Title</label>
                                    <input type="text" class="form-control" name="questions[5][name]" v-model="questions[5].title">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach([200,400,600,800,1000] as $amount)
                                <tr>
                                    @for($j = 0; $j < 6; $j++)
                                        <td>
                                            <button type="button" class="btn btn-default btn-block"
                                                @click="showQuestion({{ $j }}, {{ $amount }})">Add ${{ $amount }} Question</button>
                                        </td>
                                    @endfor
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary" @click.prevent="saveGame">Save Game</button>
                    </div>

                    <modal :show.sync="showModal">
                        <div slot="modal-header" class="modal-header">
                            <h4 class="modal-title">Section @{{ section+1 }}: $@{{ amount }} Question</h4>
                        </div>
                        <div slot="modal-body" class="modal-body">
                            <div class="form-group">
                                <label for="">Question</label>
                                <input type="text" class="form-control" name="question" v-model="question">
                            </div>
                            <div class="form-group">
                                <label for="">Answer</label>
                                <input type="text" class="form-control" name="answer" v-model="answer">
                            </div>
                        </div>
                        <div slot="modal-footer" class="modal-footer">
                            <button type="button" class="btn btn-default" @click="showModal = false">Close</button>
                            <button type="button" class="btn btn-primary" @click="saveQuestion">Save changes</button>
                        </div>
                    </modal>
                </div>
            </div>
        </div>
    </div>
@endsection
