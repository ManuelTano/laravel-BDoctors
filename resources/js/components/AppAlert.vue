<template>
    <section id="app-alert">
        <div class="alert" :class="type" role="alert" @click="deleteAlert">
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
    methods: {
        deleteAlert() {
            this.$emit("delete-alert");
        },
    },
};
</script>

<style lang="scss" scoped></style>
