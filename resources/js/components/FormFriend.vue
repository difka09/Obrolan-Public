<template>
    <div class="input-group mb-3">
        <!-- <input type="text" name="message" class="form-control" placeholder="kirim pesan.." v-model="chat" v-on:keyup.enter.prevent="submit"> -->
        <input type="text" name="message" class="form-control" placeholder="kirim pesan.." v-model="chat" @keyup.enter.prevent="submit">
        <div class="input-group-append">
            <button :disabled="isDisable(chat)" class="btn btn-primary btn-sm" id="btn-chat" @click="submit">
                Send
            </button>
        </div>
    </div>
</template>
<script>
export default {
    props: ['chats', 'user_id', 'friend_id'],
    data() {
        return {
            chat: ''
        }
    },

    methods: {
        isDisable(chat) {
            return chat.length == 0;
        }
        ,
        isTyping() {
            let channel = Echo.private('chat');
            setTimeout(function() {
                channel.whisper('typing', {
                    user: Laravel.user.name,
                    typing: true
                });
            }, 300);
        },
        submit: function(e) {
            if(this.chat != ''){
                var data = {
                    user_id: this.user_id,
                    friend_id: this.friend_id,
                    message: this.chat,
                    created_at: new Date()
                }
                this.chat ='';
                axios.post('/broadcastmessage', data).then(response => {
                    this.chats.push(data);
                })
            };

        }
    }

}
</script>
