
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

Vue.component('task', require('./components/TaskComponent.vue'));

Vue.component('task-list', {
    template: '<div><ul><task v-for="task in tasks">{{ task.description }}</task></ul></div>',
    data() {
        return {
            tasks: [
                {description: 'Go to the store', completed: true },
                {description: 'Finish screencast', completed: true },
                {description: 'Make donation', completed: false },
                {description: 'Clear inbox', completed: true },
                {description: 'Make dinner', completed: false }
            ]
        }
    }
});

Vue.component('message', {
    props: ['title', 'body'],
    data() {
        return {
            isVisible: true
        };
    },
    template: `
    <article class="message" v-show="isVisible">
    <div class="message-header">
        {{title}}
        <button class="delete" @click="isVisible = false"></button>
    </div>
    <div class="message-body">
        {{body}}
    </div>
    </article>   
    `
});

Vue.component('my-modal', {
    data() {
        return {
            showModal: true
        };
    },
    template: `
    <div class="modal is-active">
    <div class="modal-background"></div>
    <div class="box">
        <div class="modal-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam fringilla congue elit id pulvinar. Proin nec dolor turpis. Morbi vitae cursus ex. Suspendisse efficitur hendrerit erat, eget ultricies purus condimentum ultricies. Nunc efficitur pharetra sollicitudin. Vivamus porttitor vehicula magna, in elementum neque imperdiet vitae. Aliquam suscipit odio velit, vitae vestibulum mauris accumsan at. Fusce sed egestas tellus. Sed aliquam lectus sit amet malesuada dignissim.</p>
        </div>
    </div>
    <button class="modal-close is-large" aria-label="close"></button>
    </div>
    `
});

new Vue({
    el: '#root'
});
