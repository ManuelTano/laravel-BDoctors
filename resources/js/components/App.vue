<template>
    <div>
        <AppHeader />
        <AppMain :users="users" />
    </div>
</template>

<script>
import AppHeader from "./AppHeader.vue";
import AppMain from "./AppMain.vue";

export default {
    name: "App",
    components: {
        AppHeader,
        AppMain,
    },
    data() {
        return {
            users: [],
        };
    },
    methods: {
        fetchAllUsers() {
            axios.get("http://127.0.0.1:8000/api/users").then((res) => {
                this.users = res.data.users;
            });
        },
    },
    mounted() {
        this.fetchAllUsers();
    },
};
</script>
