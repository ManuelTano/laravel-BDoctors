<template>
    <main>
        <BaseInput @my-search="emitSearch" />
        <div v-for="user in users" :key="user.id">
            <UserDetails :firstName="user.first_name" />
        </div>
    </main>
</template>
  
<style lang="scss">

</style>
  
<script>
import BaseInput from './BaseInput.vue'
import UserDetails from './UserDetails.vue'

export default {
    name: 'AppMain',
    components: {
        BaseInput,
        UserDetails,
    },
    props: {
        users: Array,
    },
    methods: {
        emitSearch(search) {
            this.$emit('my-search', search)
        }
    }
}
</script>
  