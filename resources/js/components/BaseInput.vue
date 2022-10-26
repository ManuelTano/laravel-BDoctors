<template>
    <div>
        <input type="text" @change="mySearch" v-model="search">
        <button @click="mySearch">CERCA</button>
    </div>
</template>

<style lang="scss">

</style>

<script>
export default {
    name: 'BaseInput',
    data() {
        return {
            search: ''
        }
    },
    methods: {
        mySearch() {
            this.$emit('my-search', this.search)
        }
    }
}
</script>