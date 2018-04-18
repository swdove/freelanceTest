<template>
    <div :id="'reply-'+id" class="card mb-2" :class="highlightBest">
        <div class="card-header">
            <div class="level">
                <h5 class="flex">
                    <a :href="'/profiles/'+data.owner.name" v-text="data.owner.name">
                    </a> said <span v-text="ago"></span>...
                </h5>
                <div v-if="signedIn">      
                    <favorite :reply="data"></favorite>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div v-if="editing">
                <form @submit="update">
                    <div class="form-group">
                        <textarea class="form-control" v-model="body" required></textarea>
                        <button class="btn btn-sm btn-primary">Update</button>
                        <button class="btn btn-sm btn-link" @click="editing = false" type="button">Cancel</button>
                    </div>
                </form>
            </div>
            <div v-else v-html="body">
            </div>
        </div>
        <div class="card-footer level">
            <div v-if="authorize('updateReply', reply)">
                <button class="btn btn-secondary btn-sm mr-1" @click="editing = true">Edit</button>
                <button type="submit" class="btn btn-danger btn-sm" @click="destroy">Delete</button>
            </div>
            <button type="submit" class="btn btn-default btn-sm" style="margin-left: auto;" @click="markBestReply" v-show="! isBest">Best Reply?</button>
        </div>
    </div>
</template>

<script>
import Favorite from './Favorite.vue';
import moment from 'moment';
export default {
    props: ['data'],
    components: { Favorite },
    data() {
        return {
            editing: false,
            id: this.data.id,
            body: this.data.body,
            reply: this.data,
            thread: window.thread
        };
    },
    computed: {
        ago() {
            return moment(this.data.created_at).fromNow();
        },
        highlightBest() {
            return this.isBest ? 'bg-success text-white' : '';
        },
        isBest() {
            return this.thread.best_reply_id == this.id;
        }
    },
    methods: {
        update() {
            axios.patch('/replies/' + this.data.id, {
                body: this.body
            })
            .catch(error => {
                flash(error.response.data, 'danger');
            })
            this.editing = false;
            flash('Updated!');
        },
        destroy() {
            axios.delete('/replies/' + this.data.id)
                .then(() => flash('Comment deleted!'));
            this.$emit('deleted', this.data.id);
        },
        markBestReply() {
            axios.post('/replies/' + this.data.id + '/best');

            this.thread.best_reply_id = this.id;
        }
    }
}
</script>