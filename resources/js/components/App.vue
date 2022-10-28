<template>
    <div class="position-relative">
        <AppHeader />
        <BaseJumbotron />
        <router-view></router-view>
    </div>
</template>

<script>
import AppHeader from "./AppHeader.vue";
import BaseJumbotron from "./BaseJumbotron.vue";

export default {
    name: "App",
    components: {
        BaseJumbotron,
        AppHeader,
    },
    data() {
        return {
            users: [],
        };
    },
    methods: {
        fetchUsersByInput(search) {
            axios
                .get("http://127.0.0.1:8000/api/users/specialty/" + search)
                .then((res) => {
                    this.users = res.data.users;
                });
        },
    },
    mounted() {},
};
</script>

<style lang="scss"></style>
