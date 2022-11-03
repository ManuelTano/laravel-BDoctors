<template>
    <section id="message-form">
        <div class="container">
            <!-- Title -->
            <h3 class="my-3">
                Invia un messaggio {{ " a " + firstName + " " + lastName }}
            </h3>
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
                        <label for="text">Messaggio</label>
                        <textarea
                            class="form-control"
                            id="text"
                            placeholder="Scrivi qui"
                            v-model.trim="form.text"
                            rows="3"
                            required
                        ></textarea>
                    </div>
                </div>

                <!-- Button to submit form -->
                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Invia messaggio<i
                                class="fa-solid fa-arrow-right ml-2"
                            ></i>
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
    name: "MessageForm",
    components: {
        AppAlert,
    },
    props: {
        userId: String,
        firstName: String,
        lastName: String,
    },
    data() {
        return {
            // Campi del form
            form: {
                email: "",
                first_name: "",
                last_name: "",
                text: "",
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
            if (!this.form.text) errors.text = "Il messaggio è obbligatorio";

            // Assegnamo l'oggetto errors
            this.errors = errors;
        },

        submitForm() {
            // Svuotiamo l'oggetto errors per ripopolarlo nel caso di errori
            this.errors = {};

            // Lanciamo la validazione lato Vue
            this.validateForm();

            // Se non ho errori mando il form
            if (!this.hasErrors) this.sendMessage();
        },

        resetErrorsAndMessage() {
            this.errors = {};
            this.alertMessage = null;
        },

        sendMessage() {
            axios
                .post(
                    "http://127.0.0.1:8000/api/new-message/" + this.userId,
                    this.form
                )
                .then((res) => {
                    console.log("Inviata con successo");
                    if (res.data.errors) {
                        const errors = {};
                        const { email, last_name, first_name, text } =
                            res.data.errors;
                        if (email) errors.email = email[0];
                        if (last_name) errors.last_name = last_name[0];
                        if (first_name) errors.first_name = first_name[0];
                        if (text) errors.text = text[0];
                        this.errors = errors;
                    } else {
                        // Svuoto i campi
                        this.form.email = "";
                        this.form.first_name = "";
                        this.form.last_name = "";
                        this.form.text = "";
                        this.alertMessage =
                            "Messaggio inviato! Verrai contattato appena possibile";
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
