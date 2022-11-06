<template>
    <section id="app-card">
        <div
            class="card my-4 d-flex flex-column justify-content-between"
            style="width: 18rem"
        >
            <div>
                <figure class="m-0">
                    <img
                        :src="`${user.user_detail.thumb}`"
                        class="card-img-top"
                        alt="fotoo"
                    />
                </figure>
                <div class="card-body p-0">
                    <!-- <p class="card-text"> -->
                    <!-- <ul> -->
                    <!-- <li>
                        <strong>{{
                            user.sponsorships[0].business_plan
                        }}</strong>
                    </li> -->
                    <!-- Laurea conseguita -->
                    <!-- <li>
                                    <div>Laureato in Medicina</div>
                                </li> -->

                    <!-- Specializzazioni acquisite -->
                    <!-- <li>
                                    <span>Specializzato in </span>
                                    <span
                                    v-for="(specialty, index) in user.specialties"
                                    :key="index"
                                    >{{ specialty.label }}
                                    <span
                                    v-if="
                                            index ===
                                            user.specialties.length - 1
                                            "
                                        >.</span
                                        >
                                        <span v-else>,</span>
                                    </span>
                                </li> -->
                    <!-- </ul>
                        </p> -->
                </div>
            </div>
            <div>
                <div class="card-body">
                    <h5 class="card-title my-3">
                        {{ user.first_name + " " + user.last_name }}
                    </h5>
                    <button class="btn" id="show-profile" @click="showProfile">
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
    height: 450px;

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
