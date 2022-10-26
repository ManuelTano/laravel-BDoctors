<template>
    <BaseInput @my-search="emitSearch" />
</template>
  
<style lang="scss">

</style>
  
<script>
import BaseInput from './BaseInput.vue'
export default {
    name: 'AppMain',
    components: {
        BaseInput,
    },
    methods: {
        emitSearch(search) {
            this.$emit('my-search', search)
        }
    }
}
</script>
  