<template>
    <section id="doctor-page">
        <BaseJumbotron />
        <div class="container">
            <!-- {{ user.first_name + " " + user.last_name }} -->
        </div>
        <BaseFooter />
    </section>
</template>

<script>
import BaseJumbotron from "../BaseJumbotron.vue";
import BaseFooter from "../BaseFooter.vue";
export default {
    name: "DoctorPage",
    components: {
        BaseJumbotron,
        BaseFooter,
    },
    data() {
        return {
            user: null,
        };
    },
    methods: {
        // Chiamata che preleva il singolo dottore
        fetchDoctor() {
            console.log("faccio la chiamata");
            axios
                // Bisogna sistemare l'url
                .get("http://127.0.0.1:8000/api/users", this.$route.params.user)
                .then((res) => {
                    this.user = res.data.result;
                    console.log(res);
                })
                .catch((err) => {
                    console.log("User non prelevato, errore di chiamata.");
                });
        },
    },
    mounted: {
        thisfetchDoctor();
    },
};
</script>

<style lang="scss" scoped></style>
