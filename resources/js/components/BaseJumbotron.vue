<template>
    <div id="jumbo">
        <AppHeader class="position-absolute top-25 left-0 right-0" />
        <BaseInput class="transform-center" />
    </div>
</template>

<script>
import AppHeader from "./AppHeader.vue";
import BaseInput from "./BaseInput.vue";
export default {
    name: "BaseJumbotron",
    components: {
        AppHeader,
        BaseInput,
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

    position: relative;
}

.transform-center {
    position: absolute;
    top: 50%;
    left: 50%;

    transform: translate(-50%, -50%);
}
</style>
