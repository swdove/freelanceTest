@extends ('layouts.master')

@section('content')
<style type="text/css">
    .color-red {
        color: red;
    }
    .is-loading {
        background: grey;
    }
</style>
<div class="col-sm-8 blog-main" id="root">
    <my-modal v-show="showModal"></my-modal>
    <message title="Hello World!" body="Lorem ipsum dolar sit amet."></message>    
    <message title="Fuck all y'all!" body="Eat nachos."></message>  
    <task-list></task-list>
    <h1>
        Complete Tasks
    </h1>
    <ul>
        <li v-for="task in tasks" v-if="task.completed" v-text="task.description"></li>
    </ul>
    <h1>
        Incomplete Tasks
    </h1>
    <ul>
        <li v-for="task in incompleteTasks" v-text="task.description"></li>
    </ul>        
    <button :class="{ 'is-loading' : isLoading }" @click="toggleClass">
        Click Me
    </button>
    <button v-bind:title="title">Hover Over Me</button>
    <ul>
        <li v-for="name in names">@{{ name }}</li>
    </ul>

    <input id="input" type="text" v-model="newName">  
    <button id="button" @click="addName">Add Name</button>
</div>
<script>
    var app = new Vue({
        el: '#root',
        data: {
            message: 'Hello World',
            isLoading: false,
            className: 'color-red',
            title: 'Now the title is being set by Javascript',
            newName: '',
            names: ['Joe', 'Mary', 'Jane', 'Jack'],
            tasks: [
                {description: 'Go to the store', completed: true },
                {description: 'Finish screencast', completed: true },
                {description: 'Make donation', completed: false },
                {description: 'Clear inbox', completed: true },
                {description: 'Make dinner', completed: false }
            ]
        },
        methods: {
            addName() {
                this.names.push(this.newName);
                this.newName = '';
            },
            toggleClass() {
                this.isLoading = true;
            }
        },
        computed: {
            incompleteTasks() {
                return this.tasks.filter(task => ! task.completed);
            }
        }
    })
</script>
@endsection