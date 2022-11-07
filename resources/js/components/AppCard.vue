<template>
    <section id="app-card">
        <div
            class="card my-4 d-flex flex-column justify-content-between"
            style="width: 18rem"
        >
            <div>
                <figure class="m-0" v-if="user.user_detail.thumb">
                    <img
                        :src="`${user.user_detail.thumb}`"
                        class="card-img-top"
                        alt="fotoo"
                    />
                </figure>
                <div class="card-body p-0"></div>
            </div>
            <div>
                <div class="card-body">
                    <h5 class="card-title my-2">
                        {{ user.first_name + " " + user.last_name }}
                    </h5>
                    <div v-if="user.media">
                        <div v-if="user.media" class="m-0">
                            Valutazione: {{ user.media }}
                        </div>
                        <div v-if="user.numero_recensioni" class="m-0">
                            Numero di recensioni: {{ user.numero_recensioni }}
                        </div>
                    </div>
                    <button
                        class="btn my-3"
                        id="show-profile"
                        @click="showProfile"
                    >
                        Visita il profilo
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "AppCard",
    props: {
        user: Object,
        specialty: Number,
    },
    data() {
        return {
            currentUser: null,
        };
    },
    methods: {
        showProfile() {
            this.$router.push({
                name: "doctors-doctor",
                params: {
                    user: this.user.id,
                    specialty: this.specialty,
                },
            });
        },
    },
    created() {
        this.currentUser = this.user.id;
    },
};
</script>

<style lang="scss" scoped>
@import "../../sass/variables";
#app-card {
    height: 480px;

    #show-profile {
        background-color: $primary-color;
        color: white;
        border: 1px solid transparent;

        &:hover {
            // opacity: 0.9;
            background-color: white;
            color: $primary-color;
            border: 1px solid $primary-color;
        }
    }
}
</style>
