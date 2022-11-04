<template>
    <section id="app-card">

            <div class="card my-4 d-flex flex-column justify-content-between" style="width: 18rem">
                <div>
                    <img :src="`${user.user_detail.thumb}`" class="card-img-top" alt="fotoo"/>
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ user.first_name + " " + user.last_name }}
                        </h5>
                        <p class="card-text">
                            <ul>
                                <li><strong>{{ user.sponsorships[0].business_plan }}</strong></li>
                                <!-- Laurea conseguita -->
                                <li>
                                    <div>Laureato in Medicina</div>
                                </li>
                                
                                <!-- Specializzazioni acquisite -->
                                <li>
                                    <span>Specializzato in </span>
                                    <span
                                    v-for="(specialty, index) in user.specialties"
                                    :key="'spec' - specialty"
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
                                </li>
                            </ul>
                        </p>
                    </div>
                </div>
                <div>
                    <ul class="list-group list-group-flush">
                        <!-- <li class="list-group-item">media: {{ user.media }}</li>
                        <li class="list-group-item">
                            review: {{ user.numero_recensioni }}
                        </li> -->
                    </ul>
                    <div class="card-body">
                        <button class="btn" id="show-profile" @click="showProfile">Visita il profile</button>
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
    },
    data() {
        return {
            currentUser: null,
        }
    },
    methods: {
        showProfile() {
            this.$router.push({
                name: "doctors-doctor",
                params: { user: this.currentUser.id  },
            });
        }  
    },
    created() {
        this.currentUser = this.user;
    },
};
</script>

<style lang="scss" scoped>
@import "../../sass/variables";
    #app-card{
        .card{
            height: 550px;
        }

        .block{
                width: calc(100% / 3);
            }

        #show-profile{
            background-color: $primary-color;
            color: white;
            border: 1px solid transparent;

            &:hover{
                // opacity: 0.9;
                background-color: white;
                color: $primary-color;
                border: 1px solid $primary-color;
            }
        }
    }
</style>
