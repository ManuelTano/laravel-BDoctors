<template>
    <section id="advanced-search">
        <!-- Additional filter -->
        <div class="container" v-if="users.length">
            <h1 class="my-5">Ricerca avanzata</h1>
            <div>
                <form
                    @submit.prevent="submitForm"
                    class="row justify-content-center"
                    novalidate
                >
                    <!-- Rating -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <select
                                class="form-control"
                                id="rating"
                                v-model="form.rating"
                            >
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>

                    <!-- Number reviews -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="number_review"
                                >Seleziona il minimo numero di recensioni</label
                            >
                            <input
                                type="text"
                                id="number_review"
                                class="form-control"
                                v-model.trim="form.number_review"
                                required
                            />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <button class="btn btn-success mr-2" type="submit">
                                Filtra
                            </button>
                            <a @click="resetUsers" class="btn btn-secondary"
                                >Reset</a
                            >
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Alert -->
        <AppAlert
            v-if="alertMessage || hasErrors"
            :type="hasErrors ? 'alert-danger' : 'alert-success'"
            @delete-alert="resetErrorsAndMessage"
            id="alert"
            class="my-3"
        >
            <div v-if="alertMessage">{{ alertMessage }}</div>
            <div v-if="hasErrors">
                <ul>
                    <li v-for="(error, key) in errors" :key="key">
                        {{ error }}
                    </li>
                </ul>
            </div>
        </AppAlert>

        <!-- Main section: doctor card -->
        <AppMain :users="users" :specialty="choice" />
    </section>
</template>
<script>
import AppMain from "../AppMain.vue";
import AppAlert from "../AppAlert.vue";
import BaseJumbotron from "../BaseJumbotron.vue";
export default {
    name: "AdvancedSearch",
    components: {
        BaseJumbotron,
        AppMain,
        AppAlert,
    },
    data() {
        return {
            // Specializzazione corrente
            specialty: [],

            // Lista degli utenti filtrati per specializzazione
            usersBySpecialty: [],

            // Lista dei dottori filtrata per ricerca avanzata
            filterUsers: [],

            users: [],

            // Lista utenti precedentemente visualizzata
            prevUsers: [],

            // Campi del form
            form: {
                rating: null,
                number_review: null,
            },

            // Messaggio dell'alert
            alertMessage: "",

            // Eventuali errori in seguito
            errors: {},

            // Specializzazione selezionata
            choice: "",
        };
    },
    computed: {
        // Controlla continuamente se ci sono errori o meno al fine di mostrare gli errori
        hasErrors() {
            return Object.keys(this.errors).length;
        },
    },
    methods: {
        // Metodo invocato al submit del form: intercetta il submit
        // ed effettua la validazione dei campi del form stesso
        validateForm() {
            const errors = {};

            // Controllo se c'è il cognome
            if (!this.form.rating) errors.rating = "Il rating è obbligatorio";

            // Controllo se c'è il feedback
            if (!this.form.number_review)
                errors.number_review =
                    "Il numero minimo di recensioni è obbligatorio";

            // Assegnamo l'oggetto errors
            this.errors = errors;
        },

        // Metodo invocato per effettuare il submit del form
        submitForm() {
            // Svuotiamo l'oggetto errors per ripopolarlo nel caso di errori
            this.errors = {};

            // Lanciamo la validazione lato Vue
            this.validateForm();

            // Se non ho errori mando il form
            if (!this.hasErrors) this.advancedSearch();
        },

        // Metodo invocato al submit del form: raffina la ricerca
        advancedSearch() {
            const raffinate = this.usersBySpecialty.filter((user) => {
                if (
                    user.media == this.form.rating &&
                    user.numero_recensioni >= parseInt(this.form.number_review)
                )
                    return user;
            });
            if (raffinate.length !== 0) {
                this.users = raffinate;
            }
        },

        // Resetta tutti i campi del form e il messaggio
        resetErrorsAndMessage() {
            this.errors = {};
            this.alertMessage = null;
            this.users = this.usersBySpecialty;
        },

        // Al click del button di reset: resetto i campi del form
        // e ed visualizzo la lista precendemente filtrata di dottori
        resetUsers() {
            if (this.form.rating && this.form.number_review) {
                this.form.number_review = "";
                this.form.rating = "";

                this.resetErrorsAndMessage();
            }
        },

        // **** Filtro dei dottori per specializzazioni
        fetchDoctorsBySpecialties(choice) {
            this.choice = choice;
            axios
                .get("http://127.0.0.1:8000/api/users/specialty/" + choice)
                .then((res) => {
                    this.usersBySpecialty = res.data.users_by_specialty;
                    this.filterBySponsorship();
                    console.log("chiamata effettuata con successo");
                });
        },

        // Filtra il risultato dell'api per sponsorizzazioni
        filterBySponsorship() {
            const basicUsers = this.usersBySpecialty.filter((user) => {
                if (user.sponsorships[0].business_plan === "basic") return user;
            });
            console.log("basic: ", basicUsers);

            const goldUsers = this.usersBySpecialty.filter((user) => {
                if (user.sponsorships[0].business_plan === "gold") return user;
            });

            console.log("gold: ", goldUsers);

            const silverUsers = this.usersBySpecialty.filter((user) => {
                if (user.sponsorships[0].business_plan === "silver")
                    return user;
            });

            console.log("silver: ", silverUsers);

            const bronzeUsers = this.usersBySpecialty.filter((user) => {
                if (user.sponsorships[0].business_plan === "bronze")
                    return user;
            });

            console.log("bronze: ", bronzeUsers);

            this.usersBySpecialty = this.users = [
                ...goldUsers,
                ...silverUsers,
                ...bronzeUsers,
                ...basicUsers,
            ];
        },

        // Filtra la specializzazione corrente
        filterSpecialty() {
            axios
                .get("http://127.0.0.1:8000/api/specialties/" + this.choice)
                .then((res) => {
                    this.specialty = res.data.specialty;
                });
        },
    },
    mounted() {
        this.fetchDoctorsBySpecialties(this.choice);
        this.filterSpecialty();
    },
    created() {
        this.choice = this.$route.params.id;
    },
};
</script>

<style lang="scss" scoped>
#advanced-search {
    padding-top: 150px;

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

    #alert {
        ul {
            display: block;
            margin: 0;

            li {
                margin: 5px 0;
            }
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
}
</style>
