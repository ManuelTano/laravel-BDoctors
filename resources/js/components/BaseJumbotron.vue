<template>
    <div id="jumbo">
        <slot />
    </div>
</template>

<script>
import AppHeader from "./AppHeader.vue";
export default {
    name: "BaseJumbotron",
    components: {
        AppHeader,
    },
};
</script>

<style lang="scss" scoped>
#jumbo {
    background-image: url("https://img.freepik.com/free-vector/clean-medical-background_53876-116875.jpg?w=2000");
    background-size: cover;
    background-repeat: no-repeat;
    width: 100%;
    height: 500px;
    margin-top: 100px;
}


</style>
