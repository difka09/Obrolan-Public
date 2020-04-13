<template>
    <div class="header">
        {{created_at | myOwnTime}}
    </div>
</template>
<script>
export default {
    props:['created_at'],
    filters: {
        myOwnTime(value){
            moment.locale('id');
            return moment(value).fromNow();
        }
    },
    created(){
       this.interval = setInterval(() => this.$forceUpdate(), 1000);
    },
    beforeDestroy(){
        clearInterval(this.interval);
    }
}
</script>
