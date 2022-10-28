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
    background-image: url("https://cdn.wallpapersafari.com/83/61/edRJ9V.jpeg");
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    width: 100%;
    height: 500px;
}

.transform-center {
    position: absolute;
    top: 50%;
    left: 50%;

    transform: translate(-50%, -50%);
}
</style>
