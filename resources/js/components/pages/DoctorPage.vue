<template>
    <section id="doctor-page">
        <BaseJumbotron />
        <div class="container">
            <div class="d-flex align-items-centern p-3">
                <!-- Immagine del dottore -->
                <figure class="m-0">
                    <img
                        src="https://www.morfopsicologia.net/wp-content/uploads/2020/07/clienti-morfopsicologia-1.jpg"
                        alt=""
                        class="img-fluid h-100 rounded-circle"
                    />
                </figure>
                <!-- Informazioni principale: Nome completo e specializzazioni -->
                <div class="ml-3 d-flex align-items-center">
                    <div>
                        <h1 class="m-0">
                            {{ user[0].first_name + " " + user[0].last_name }}
                        </h1>
                        <div>
                            <span>Specializzato in </span>
                            <span
                                v-for="(specialty, index) in user[0]
                                    .specialties"
                                :key="specialty"
                                >{{ specialty.label }}
                                <span
                                    v-if="
                                        index === user[0].specialties.length - 1
                                    "
                                    >.</span
                                >
                                <span v-else>,</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3"></div>

            <!-- $ Form -->

            <!-- @ Send new message -->
            <MessageForm :userId="user[0].id" />

            <!-- @ Send new review -->
            <ReviewForm :userId="user[0].id" />
        </div>
    </section>
</template>

<script>
import BaseJumbotron from "../BaseJumbotron.vue";
import MessageForm from "../MessageForm.vue";
import ReviewForm from "../ReviewForm.vue";
export default {
    name: "DoctorPage",
    components: {
        BaseJumbotron,
        MessageForm,
        ReviewForm,
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

<style lang="scss" scoped>
#doctor-page {
    figure {
        width: 200px;
        height: 200px;

        img {
            object-fit: cover;
        }
    }
}
</style>
