<template>
    <section id="app-alert">
        <div class="alert position-relative" :class="type" role="alert">
            <slot />
            <!-- Icona che consente di eliminare il post -->
            <i class="fa-solid fa-xmark" @click="deleteAlert"></i>
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

<style lang="scss" scoped>
.fa-solid.fa-xmark {
    position: absolute;
    top: 4%;
    right: 1%;

    cursor: pointer;

    &:hover {
        color: white;
    }
}
</style>
