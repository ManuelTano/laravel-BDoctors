<template>
    <section id="form-review">
        <div class="container">
            <!-- Alert -->
            <AppAlert
                v-if="alertMessage || hasErrors"
                :type="hasErrors ? 'alert-danger' : 'alert-success'"
                @delete-alert="resetErrorsAndMessage"
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

            <!-- Form -->
            <form class="row" @submit.prevent="submitForm" novalidate>
                <!-- Email Address -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            placeholder="Inserisci l'email"
                            v-model.trim="form.email"
                            required
                        />
                    </div>
                </div>

                <!-- First Name -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="first_name">Nome</label>
                        <input
                            type="text"
                            class="form-control"
                            id="first_name"
                            placeholder="Inserisci il tuo nome"
                            v-model.trim="form.first_name"
                            required
                        />
                    </div>
                </div>

                <!-- Last Name -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="last_name">Cognome</label>
                        <input
                            type="text"
                            class="form-control"
                            id="last_name"
                            placeholder="Inserisci il cognome"
                            v-model.trim="form.last_name"
                            required
                        />
                    </div>
                </div>

                <!-- Feedback -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="feedback">Feedback</label>
                        <textarea
                            class="form-control"
                            id="feedback"
                            placeholder="Lascia un feedback"
                            v-model.trim="form.feedback"
                            rows="3"
                            required
                        ></textarea>
                    </div>
                </div>

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

                <!-- Button to submit form -->
                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Invia Recensione
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</template>

<script>
import AppAlert from "../components/AppAlert.vue";

export default {
    name: "ReviewForm",
    components: {
        AppAlert,
    },
    data() {
        return {
            // Campi del form
            form: {
                email: "",
                first_name: "",
                last_name: "",
                feedback: "",
                rating: null,
            },

            // Eventuali errori del form
            errors: {},

            // Messaggio che passeremo nell'alert
            alertMessage: "",
        };
    },
    computed: {
        // Controlla continuamente se ci sono errori o meno al fine di mostrare gli errori
        hasErrors() {
            return Object.keys(this.errors).length;
        },
    },
    methods: {
        validateForm() {
            const errors = {};

            // Controllo se c'è il nome
            if (!this.form.first_name)
                errors.first_name = "Il nome è obbligatorio";

            // Controllo se c'è il cognome
            if (!this.form.last_name)
                errors.last_name = "Il cognome è obbligatorio";

            // Controllo che l'email sia valida
            if (
                this.form.email &&
                !this.form.email.match(
                    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                )
            ) {
                errors.email = "L'email inserita non è valida";
            }

            // Controllo se c'è il feedback
            if (!this.form.feedback)
                errors.feedback = "Il feedback è obbligatorio";

            // Controllo se c'è il nome
            if (!this.form.rating) errors.rating = "Il rating è obbligatorio";

            // Assegnamo l'oggetto errors
            this.errors = errors;
        },

        submitForm() {
            // Svuotiamo l'oggetto errors per ripopolarlo nel caso di errori
            this.errors = {};

            // Lanciamo la validazione lato Vue
            this.validateForm();

            // Se non ho errori mando il form
            if (!this.hasErrors) this.sendReview();
        },

        resetErrorsAndMessage() {
            this.errors = {};
            this.alertMessage = null;
        },

        sendReview() {
            axios
                .post("http://127.0.0.1:8000/api/new-review", this.form)
                .then((res) => {
                    console.log("Inviata con successo");
                    console.log(res.data);
                    if (res.data.errors) {
                        const errors = {};
                        const {
                            email,
                            last_name,
                            first_name,
                            feedback,
                            rating,
                        } = res.data.errors;
                        if (email) errors.email = email[0];
                        if (last_name) errors.last_name = last_name[0];
                        if (first_name) errors.first_name = first_name[0];
                        if (rating) errors.rating = rating[0];
                        if (feedback) errors.feedback = feedback[0];
                        this.errors = errors;
                    } else {
                        // Svuoto i campi
                        this.form.email = "";
                        this.form.first_name = "";
                        this.form.last_name = "";
                        this.form.feedback = "";
                        this.form.rating = "";
                        this.alertMessage =
                            "Recensione inviata! Ti contatteremo il prima possibile";
                    }
                })
                .catch((err) => {
                    console.log("Non è stata inviata");
                    this.errors = { http: "Si è verificato un errore" };
                })
                .then(() => {});
        },
    },
};
</script>

<style lang="scss" scoped>
ul {
    list-style-type: none;
}
</style>
