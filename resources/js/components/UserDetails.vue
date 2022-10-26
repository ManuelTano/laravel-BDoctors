<template>
    <div>
        <h4>{{ firstName }}</h4>
    </div>
</template>
  
<style lang="scss">

</style>
  
<script>

export default {
    name: 'UserDetails',
    props: {
        firstName: String,
    },
}
</script>