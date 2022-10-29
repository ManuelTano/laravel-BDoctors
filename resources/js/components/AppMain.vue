<template>
    <main>
        <DoctorsView :users="users" />

    </main>
</template>

<style lang="scss">

</style>

<script>


import DoctorsView from "./DoctorsView.vue";

export default {
    name: "AppMain",
    components: {
        DoctorsView
    },
    props: {
        users: Array,
    },
    methods: {
        emitSearch(search) {
            this.$emit("my-search", search);
        },
    },
};
</script>
