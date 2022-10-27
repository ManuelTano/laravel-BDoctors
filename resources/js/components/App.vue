<template>
    <div>
        <AppHeader />
        <AppMain :users="users" @my-search="fetchUsersByInput" />
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
        // Chiamata che preleva tutti i dottori
        fetchAllUsers() {
            axios.get("http://127.0.0.1:8000/api/users").then((res) => {
                this.users = res.data.users;
            });
        },

        fetchUsersByInput(search) {
            axios
                .get("http://127.0.0.1:8000/api/users/specialty/" + search)
                .then((res) => {
                    this.users = res.data.users;
                });
        },
    },
    mounted() { },
};
</script>
