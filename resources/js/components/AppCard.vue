<template>
    <section id="app-card">

            <div class="card my-4 d-flex flex-column justify-content-between" style="width: 18rem">
                <div>
                    <img src="" class="card-img-top" alt="" />
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ user.first_name + " " + user.last_name }}
                        </h5>
                        <p class="card-text">
                            <ul>
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
                    <!-- <ul class="list-group list-group-flush">
                        <li class="list-group-item">media: {{ user.media }}</li>
                        <li class="list-group-item">
                            review: {{ user.numero_recensioni }}
                        </li>
                    </ul> -->
                    <div class="card-body">
                        <button class="btn" id="show-profile">Visita il profile</button>
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
    created() {
        console.log(this.user);
    },
};
</script>

<style lang="scss" scoped>
@import "../../sass/variables";
    #app-card{
        .card{
            height: 350px;
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
