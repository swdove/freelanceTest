<template>
    <li class="nav-item dropdown" v-if="notifications.length">
        <a class="nav-link dropdown-toggle" id="navbarNotifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-bell"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarNotifications">
            <div v-for="notification in notifications">
                <a class="dropdown-item" :href="notification.data.link" v-text="notification.data.message" @click="markAsRead(notification)"></a>
            </div>   
            <div>
                <a class="dropdown-item" href="#" @click="markAllRead">Mark All Read</a>
            </div>             
        </div>
    </li>   
</template>

<script>
    export default {
        data(){
            return { notifications: false }
        },
        created() {
            axios.get('/profiles/' + window.App.user.name + "/notifications")
                .then(response => this.notifications = response.data);
        },
        methods: {
            markAsRead(notification) {
                axios.delete('/profiles/' + window.App.user.name + '/notifications/' + notification.id);
            },
            markAllRead(notification) {
                axios.delete('/profiles/' + window.App.user.name + '/notifications/')
                    .then(this.notifications = []);
            }
        }
    }
</script>