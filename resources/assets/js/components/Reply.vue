<template>
    <div :id="'reply-'+id" class="card mb-2" :class="highlightBest">
        <div class="card-header">
            <div class="level">
                <h5 class="flex">
                    <a :href="'/profiles/'+reply.owner.name" v-text="reply.owner.name">
                    </a> said <span v-text="ago"></span>...
                </h5>
                <div v-if="signedIn">      
                    <favorite :reply="reply"></favorite>
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
        <div class="card-footer level" v-if="authorize('owns', reply) || authorize('owns', reply.thread)">
            <div v-if="authorize('owns', reply)">
                <button class="btn btn-secondary btn-sm mr-1" @click="editing = true">Edit</button>
                <button type="submit" class="btn btn-danger btn-sm" @click="destroy">Delete</button>
            </div>
            <button type="submit" class="btn btn-default btn-sm" style="margin-left: auto;" @click="markBestReply" v-if="authorize('owns', reply.thread) && ! isBest">Best Reply?</button>
        </div>
    </div>
</template>

<script>
import Favorite from './Favorite.vue';
import moment from 'moment';
export default {
    props: ['reply'],
    components: { Favorite },
    data() {
        return {
            editing: false,
            id: this.reply.id,
            body: this.reply.body,
            thread: window.thread
        };
    },
    computed: {
        ago() {
            return moment(this.reply.created_at).fromNow();
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
            axios.patch('/replies/' + this.id, {
                body: this.body
            })
            .catch(error => {
                flash(error.response.data, 'danger');
            })
            this.editing = false;
            flash('Updated!');
        },
        destroy() {
            axios.delete('/replies/' + this.id)
                .then(() => flash('Comment deleted!'));
            this.$emit('deleted', this.id);
        },
        markBestReply() {
            axios.post('/replies/' + this.id + '/best');

            this.thread.best_reply_id = this.id;
        }
    }
}
</script>