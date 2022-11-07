<template>
    <section id="homepage">
        <!-- Jumbotron -->
        <BaseJumbotron
            class="d-flex align-items-center justify-content-between"
        >
            <div class="container">
                <div class="row margin-left">
                    <div class="col-8">
                        <div class="mb-5">
                            <span class="title"> Cerca un </span
                            ><span class="wordchanger"></span>
                        </div>
                    </div>
                </div>
                <div class="row margin-left">
                    <div class="col-8">
                        <BaseSelect
                            @doctors-for-specialty="changeSpecialties"
                            :specialties="specialties"
                            text="Scegli una specializzazione"
                        />
                    </div>
                </div>
            </div>
        </BaseJumbotron>

        <!-- Featured Doctors -->
        <div class="container">
            <h1 class="my-5 text-center">Dottori in evidenza</h1>
            <AppMain :users="users" />
        </div>

        <!-- Statistics card -->
        <BaseCard />

        <!-- Spot -->
        <div class="row justify-content-center mt-5">
            <div class="col-6 text-center">
                <h2>Il nostro spot</h2>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-6 text-center">
                <iframe
                    width="660"
                    height="415"
                    src="https://www.youtube.com/embed/w2rCh6Rtj-4"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                ></iframe>
            </div>
        </div>
    </section>
</template>

<script>
import BaseSelect from "../BaseSelect.vue";
import BaseJumbotron from "../BaseJumbotron.vue";
import BaseCard from "../BaseCard.vue";
import AppMain from "../AppMain.vue";
export default {
    name: "HomePage",
    components: {
        BaseSelect,
        BaseJumbotron,
        BaseCard,
        AppMain,
    },
    data() {
        return {
            specialties: [],
            users: [],
        };
    },
    methods: {
        // Metodo che preleva tutte le specializzazioni per riempire la select
        fetchSpecialties() {
            axios.get("http://127.0.0.1:8000/api/specialties").then((res) => {
                this.specialties = res.data.specialties;
            });
        },

        // Al change del valore della select verremo reinderizzato sulla pagina di ricerca avanzata
        changeSpecialties(choice) {
            this.$router.push({
                name: "advanced-search",
                params: { id: choice },
            });
        },

        // Metodo chhe preleva tutti i dottori della piattaforma
        fetchFeaturedDoctors() {
            axios
                .get("http://127.0.0.1:8000/api/featured-users")
                .then((res) => {
                    this.users = res.data.users;
                    console.log("dati presi");
                })
                .catch((err) => {
                    console.log("ci sono stati errori");
                });
        },
    },
    mounted() {
        this.fetchSpecialties();
        this.fetchFeaturedDoctors();
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

form {
    ul {
        display: block;
        list-style-type: disc;
    }
}

.margin-left {
    margin-left: 15px;
}

.title {
    color: #b1a8e5;
    text-align: center;
    font-family: "Avenir Next", "Roboto", sans-serif;
    font-size: 5vw;
    line-height: 1;
    letter-spacing: -0.02em;
    font-weight: 800;
}

.wordchanger::before {
    content: "humanising";
    display: block;
    position: relative;
    color: #b1a8e5;
    text-align: center;
    font-family: "Avenir Next", "Roboto", sans-serif;
    font-size: 5vw;
    line-height: 1;
    letter-spacing: -0.02em;
    font-weight: 800;
    animation-name: mywordchange;
    animation-duration: 8s;
    animation-iteration-count: infinite;
    animation-timing-function: ease-in-out;
}

@keyframes mywordchange {
    0% {
        content: "pediatra";
        opacity: 0.58;
    }
    10% {
        content: "pediatra";
        opacity: 1;
    }
    19% {
        content: "pediatra";
        opacity: 0;
    }
    20% {
        content: "dermatologo";
        opacity: 0;
    }
    30% {
        content: "dermatologo";
        opacity: 1;
    }
    39% {
        content: "dermatologo";
        opacity: 0;
    }
    40% {
        content: "cardiologo";
        opacity: 0;
    }
    50% {
        content: "cardiologo";
        opacity: 1;
    }
    59% {
        content: "cardiologo";
        opacity: 0;
    }
    60% {
        content: "oculista";
        opacity: 0;
    }
    70% {
        content: "oculista";
        opacity: 1;
    }
    79% {
        content: "oculista";
        opacity: 0;
    }
    80% {
        content: "urologo";
        opacity: 0;
    }
    90% {
        content: "urologo";
        opacity: 1;
    }
    99% {
        content: "urologo";
        opacity: 0;
    }
    100% {
        content: "pediatra";
        opacity: 0;
    }
}
</style>
