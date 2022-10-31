<template>
    <section id="advanced-search">
        <BaseJumbotron />
        <AppMain :users="users" />
    </section>
</template>
<script>
import BaseJumbotron from "../BaseJumbotron.vue";
import AppMain from "../AppMain.vue";
export default {
    name: "AdvancedSearch",
    components: {
        BaseJumbotron,
        AppMain,
        ReviewForm,
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
                console.log(res.data);
                this.users = res.data;
            });
        },
    },
    mounted() {
        this.fetchAllUsers();
    },
};
</script>

<style lang="scss" scoped>
ul {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;

    list-style-type: none;

    margin: 50px 0;

    li {
        margin: 20px 0;
    }
}
</style>
