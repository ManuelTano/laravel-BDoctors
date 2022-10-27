<template>
    <div>
        <BaseJumbotron />
        <router-view></router-view>
        <!-- <AppMain :users="users" @my-search="fetchUsersByInput" /> -->
    </div>
</template>

<script>
// import AppMain from "./AppMain.vue";
import BaseJumbotron from "./BaseJumbotron.vue";

export default {
    name: "App",
    components: {
        // AppMain,
        BaseJumbotron,
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
