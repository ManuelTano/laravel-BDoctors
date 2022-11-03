<template>
    <section id="advanced-search">
        <!-- Jumbotron -->
        <BaseJumbotron />

        <!-- Additional filter -->
        <div class="container" v-if="users.length">
            <h3 class="text-center my-5">Raffina i tuoi risultati</h3>
            <div>
                <form @submit.prevent="submitForm" class="row" novalidate>
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
                            <button class="btn btn-success" type="submit">
                                Filtra
                            </button>
                        </div>
                    </div>
                </form>
                <div class="col-12 p-0">
                    <button class="btn btn-warning" @click="resetUsers">
                        Reset
                    </button>
                </div>
            </div>
        </div>

        <!-- Alert -->
        <AppAlert
            v-if="alertMessage || hasErrors"
            :type="hasErrors ? 'alert-danger' : 'alert-success'"
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
        <AppMain :users="users" />
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
            // Lista degli utenti correntemente visualizzata
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
            const raffinate = this.users.filter((user) => {
                if (
                    user.media == this.form.rating &&
                    user.numero_recensioni >= parseInt(this.form.number_review)
                )
                    return user;
            });
            if (raffinate.length !== 0) {
                this.prevUsers = this.users;
                this.users = raffinate;
            }
        },

        // Resetta tutti i campi del form e il messaggio
        resetErrorsAndMessage() {
            this.errors = {};
            this.alertMessage = null;
        },

        // Al click del button di reset: resetto i campi del form
        // e ed visualizzo la lista precendemente filtrata di dottori
        resetUsers() {
            if (this.form.rating && this.form.number_review) {
                this.form.number_review = "";
                this.form.rating = "";

                this.resetErrorsAndMessage();

                this.users = this.prevUsers;
            }
        },

        // **** Filtro dei dottori per specializzazioni
        fetchDoctorsBySpecialties(choice) {
            this.choice = choice;
            axios
                .get("http://127.0.0.1:8000/api/users/specialty/" + choice)
                .then((res) => {
                    this.users = res.data.users_by_specialty;
                    console.log(res.data.users_by_specialty);
                });
        },

        // Metodo che filtra ulteriormente le ricerche dei medici in funzione
        // della specializzazione in base alla media voti
        // filterByAVG() {
        //     if (this.choice !== "") {
        //         axios
        //             .get(
        //                 "http://127.0.0.1:8000/api/users-raffinate-by-rating/" +
        //                     this.choice
        //             )
        //             .then((res) => {
        //                 this.users = res.data.raffinate_users;
        //                 console.log(res.data.raffinate_users);
        //             });
        //     }
        // },

        // Metodo che filtra ulteriormente le ricerche dei medici in funzione
        // della specializzazione in base al numero di recensioni
        // filterByReviews() {
        //     if (this.choice !== "") {
        //         axios
        //             .get(
        //                 "http://127.0.0.1:8000/api/users-raffinate-by-review/" +
        //                     this.choice
        //             )
        //             .then((res) => {
        //                 this.users = res.data.raffinate_users;
        //                 console.log(res.data.raffinate_users);
        //             });
        //     }
        // },
    },
    mounted() {
        this.fetchDoctorsBySpecialties(this.choice);
    },
    created() {
        this.choice = this.$route.params.id;
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
