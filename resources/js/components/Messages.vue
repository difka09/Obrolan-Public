<style scoped>
    .time-me {
        font-size: 10px;
        text-align: left;
    }
    .time-friend {
        font-size: 10px;
        text-align: right;
    }
    .no-message p {
        height: 200px;
        display: flex;
        align-items: center;
    }
</style>
<template>
    <ul class="chat" v-if="messages.length != 0">
        <li class="left clearfix" v-for="(message, index) in messages" :key="message + '-' +index">
            <div class="chat-body clearfix">
                <div class="header">
                    <dw-timenow class="time-friend" v-bind:created_at="message.created_at"></dw-timenow>
                    <strong class="primary-font">
                        {{message.user.name}}
                    </strong>
                </div>
                <p>
                    {{message.message}}
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
    props: ['messages']
}
</script>
