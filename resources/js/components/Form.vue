<template>
    <div class="input-group mb-3">
        <input type="text" name="message" class="form-control" placeholder="kirim pesan.." v-model="message"  @keydown="isTyping" @keyup.enter="submit">
        <div class="input-group-append">
            <button class="btn btn-primary btn-sm" id="btn-chat" @click="submit">
                Send
            </button>
        </div>
    </div>
</template>
<script>
export default {
    props: ['user'],
    data() {
        return {
            message: ''
        }
    },

    methods: {

        isTyping() {
            let channel = Echo.private('chat');
            setTimeout(function() {
                channel.whisper('typing', {
                    user: Laravel.user.name,
                    typing: true
                });
            }, 300);
        },
        submit() {
            this.$emit('sent', {
                user: this.user,
                message: this.message,
                created_at: new Date()
            });

            this.message =''
        }
    }
}
</script>
