<template>
    <section id="app-alert">
        <div class="alert" :class="type" role="alert">
            <slot />
        </div>
    </section>
</template>

<script>
export default {
    name: "AppAlert",
    props: {
        type: String,
    },
};
</script>

<style lang="scss" scoped></style>
