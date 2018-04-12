<template>
    <button type="submit" class="btn btn-sm btn-default" @click="toggle">
        <!-- <span class="fas fa-heart"></span>  -->
        <i :class="classes"></i> 
        <span v-text="count"></span>
    </button>
</template>

<script>
export default {
    props: ['reply'],
    data() {
        return {
            count: this.reply.favoritesCount,
            isFavorited: this.reply.isFavorited
        }
    },
    computed: {
        classes() {
            //return ['btn', 'btn-sm', this.isFavorited ? 'btn-primary' : 'btn-default'];
            return ['fa', this.isFavorited ? 'fa-heart' : 'fa-heart-o'];
        },
        endpoint() {
            return '/replies/' + this.reply.id + '/favorites';
        }
    },
    methods: {
        toggle() {
            return this.isFavorited ? this.destroy() : this.create();
        },
        create(){
            axios.post(this.endpoint);
            this.isFavorited = true;
            this.count++;
        },
        destroy() {
            axios.delete(this.endpoint);
            this.isFavorited = false;
            this.count--;
        }
    }
}
</script>