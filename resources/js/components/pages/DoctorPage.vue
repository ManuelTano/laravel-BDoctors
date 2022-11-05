<template>
    <section id="doctor-page">
        <div class="container">
            <div class="d-flex align-items-centern p-3" v-if="user">
                <!-- Immagine del dottore -->
                <figure class="m-0">
                    <img
                        :src="user[0].thumb"
                        alt=""
                        class="img-fluid h-100 rounded-circle"
                    />
                </figure>
                <!-- Informazioni principale: Nome completo e specializzazioni -->
                <div
                    class="ml-3 d-flex align-items-center flex-column justify-content-between"
                >
                    <!-- Main information -->
                    <div>
                        <h1 class="m-0">
                            {{ user[0].first_name + " " + user[0].last_name }}
                        </h1>
                        <div>
                            <ul>
                                <!-- Laurea conseguita -->
                                <li>
                                    <div>Laureato in Medicina</div>
                                </li>

                                <!-- Specializzazioni acquisite -->
                                <li>
                                    <span>Specializzato in </span>
                                    <span
                                        v-for="(specialty, index) in user[0]
                                            .specialties"
                                        :key="index"
                                        >{{ specialty.label }}
                                        <span
                                            v-if="
                                                index ===
                                                user[0].specialties.length - 1
                                            "
                                            >.</span
                                        >
                                        <span v-else>,</span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Address -->
                    <address class="d-flex justify-content-between w-100">
                        <div>
                            <div class="mr-2">
                                {{ user[0].phone ?? "+39 3498976345" }}
                            </div>
                            <div>
                                {{ user[0].address }}
                            </div>
                        </div>
                        <!-- Reviews and messages -->
                        <div></div>
                    </address>
                </div>
            </div>
            <div class="p-3"></div>

            <!-- $ ReviewsList -->
            <h3 class="my-3">Recensioni effettuate da altri utenti</h3>
            <ReviewsList :reviews="user[0].reviews" class="reviews-list" />

            <!-- $ Form -->

            <!-- @ Send new message -->
            <MessageForm
                :userId="user[0].id"
                :firstName="user[0].first_name"
                :lastName="user[0].last_name"
            />

            <!-- Separatore di sezione -->
            <hr />

            <!-- @ Send new review -->
            <ReviewForm
                :userId="user[0].id"
                :firstName="user[0].first_name"
                :lastName="user[0].last_name"
            />

            <!-- Separatore di sezione -->
            <hr />

            <!-- Buttone che ritorna alla lista di dottori -->
            <div class="d-flex align-items-center justify-content-end my-3">
                <button @click="returnBack" class="btn btn-warning">
                    Ritorna alla lista dei dottori
                    <i class="ml-2 fa-solid fa-rotate-left"></i>
                </button>
            </div>
        </div>
    </section>
</template>

<script>
import MessageForm from "../MessageForm.vue";
import ReviewForm from "../ReviewForm.vue";
import ReviewsList from "../ReviewsList.vue";
export default {
    name: "DoctorPage",
    components: {
        MessageForm,
        ReviewForm,
        ReviewsList,
    },
    data() {
        return {
            user: {},
        };
    },
    methods: {
        // Chiamata che preleva il singolo dottore
        fetchDoctor() {
            axios
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

        // Metodo che ritorna alla lista dei dottori
        returnBack() {
            if (this.$route.params.specialty) {
                this.$router.push({
                    name: "advanced-search",
                    params: { id: this.$route.params.specialty },
                });
            } else {
                this.$router.push({
                    name: "home",
                });
            }
        },
    },
    mounted() {
        this.fetchDoctor();
    },
};
</script>

<style lang="scss" scoped>
#doctor-page {
    padding-top: 150px;
    figure {
        width: 200px;
        height: 200px;

        img {
            object-fit: cover;
        }
    }
    .reviews-list {
        max-height: 400px;
        overflow-y: scroll;
    }
}
</style>
