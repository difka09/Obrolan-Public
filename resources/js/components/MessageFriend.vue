<style scoped>
    .chat-me p {
        float: right;
    }
    .chat-friend p{
        float: left;
    }
    .no-message p {
        height: 200px;
        display: flex;
        align-items: center;
    }
    .time-me {
        font-size: 10px;
        text-align: left;
    }
    .time-friend {
        font-size: 10px;
        text-align: right;
    }
</style>
<template>
    <ul class="chat" v-if="chats.length != 0">
        <li class="left clearfix" v-for="(chat, index) in chats" :key="chat + '-' +index">
            <div class="chat-body clearfix chat-me" v-if="chat.user_id == user_id">
                    <dw-timenow class="time-me" v-bind:created_at="chat.created_at"></dw-timenow>
                <p>
                    {{chat.message}}
                </p>
            </div>
            <div class="chat-body clearfix chat-friend" v-else>
                <div class="header" style="font-size:10px;text-align:right;">
                    <dw-timenow class="time-friend" v-bind:created_at="chat.created_at"></dw-timenow>
                </div>
                <p>
                {{chat.message}}
                </p>
            </div>
        </li>
    </ul>
    <ul v-else>
        <div class="no-message">
            <p>
            There are no messages
            </p>
        </div>
    </ul>
</template>

<script>
export default {
    props: ['chats', 'user_id', 'friend_id'],

}
</script>
