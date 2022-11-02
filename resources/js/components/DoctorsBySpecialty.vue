<template>
    <section id="doctors-by-specialty">
        <AppMain :users="users" />
    </section>
</template>

<script>
import AppMain from "./AppMain.vue";
export default {
    name: "DoctorsBySpecialty",
    components: {
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
            axios
                .get(
                    "http://127.0.0.1:8000/api/users/specialty" +
                        this.$route.params.query
                )
                .then((res) => {
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

<style lang="scss" scoped></style>
