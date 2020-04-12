<template>
     <ul>
        <li class="left clearfix" v-for="(user, index) in users" :key="index">
            <strong class="primary-font">
                {{user.name}}
            </strong>
        </li>
    </ul>
</template>

<script>
export default {
    name: 'dw-activeuser',
    props: ['me'],
    data(){
        return {
            users: []
        }
    },
    mounted(){
        this.users.push(this.me)

        Echo.join('online')
            .here(users => {
                this.users = users;
            })
            .joining(user => {
                this.users.push(user);

            })
            .leaving(user => {
                this.users = this.users.filter(u => (u.id !== user.id))
            });
    }
}
</script>
