<template>
    <div>
        <div v-if="signedIn">
            <div class="form-group">
                <wysiwyg name="body" v-model="body" placeholder="Whatcha thinkin'?" :shouldClear="completed"></wysiwyg>
                <!-- <textarea name="body" 
                    id="body" 
                    class="form-control" 
                    placeholder="Whatcha thinkin'?" 
                    rows="5" 
                    required
                    v-model="body"></textarea>                 -->
            </div>
            <button type="submit" class="btn btn-info" @click="addReply">Post Reply</button>
        </div>
        <div v-else>
            <p class="text-center">Please <a href="/login">sign in</a> to participate in this discussion.</p>  
        </div>
    </div>
</template>

<script>
    import 'jquery.caret';
    import 'at.js';
    export default {
        data() {
            return {
                body: '',
                completed: false
            }
        },
        computed: {
            signedIn() {
                return window.App.signedIn;
            }
        },
        mounted() {
            $('#body').atwho({
                at: "@",
                delay: 750,
                callbacks: {
                    remoteFilter: function(query, callback) {
                        $.getJSON("/api/users", {name: query}, function(usernames) {
                            callback(usernames)
                        });
                    }
                }
            })
        },
        methods: {
            addReply() {
                axios.post(location.pathname + '/replies', { body: this.body })
                    .catch(error => {
                        flash(error.response.data, 'danger');
                    })
                    .then(({data}) => {
                        this.body = '';
                        this.completed = true;
                        flash('Your reply has been posted.');
                        this.$emit('created', data);
                    }); 
            }
        }
    }
</script>