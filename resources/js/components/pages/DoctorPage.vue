<template>
    <section id="doctor-page">
        <BaseJumbotron />
        <div class="container">
            {{ user[0].first_name + " " + user[0].last_name }}
        </div>
    </section>
</template>

<script>
import BaseJumbotron from "../BaseJumbotron.vue";
export default {
    name: "DoctorPage",
    components: {
        BaseJumbotron,
    },
    data() {
        return {
            user: null,
        };
    },
    methods: {
        // Chiamata che preleva il singolo dottore
        fetchDoctor() {
            axios
                // Bisogna sistemare l'url
                .get(
                    "http://127.0.0.1:8000/api/users/" + this.$route.params.user
                )
                .then((res) => {
                    this.user = res.data.result;
                    console.log("faccio la chiamata");
                    console.log(res.data.result);
                })
                .catch((err) => {
                    console.log("User non prelevato, errore di chiamata.");
                });
        },
    },
    mounted() {
        this.fetchDoctor();
    },
};
</script>

<style lang="scss" scoped></style>
