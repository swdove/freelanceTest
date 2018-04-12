<template>
    <button :class="classes" @click="subscribe" v-text="subText"></button>
</template>

<script>
    export default {
        props: ['active'],
        computed: {
            classes() {
                return ['btn', this.active ? 'btn-primary' : 'btn-default']
            },
            subText() {
                return this.active ? 'Subscribed' : 'Subscribe'
            }
        },
        methods: {
            subscribe() {
                let requestType = this.active? 'delete' : 'post';
                axios[(this.active? 'delete' : 'post')](location.pathname + '/subscriptions');

                this.active = ! this.active;
            }
        }
    }
</script>