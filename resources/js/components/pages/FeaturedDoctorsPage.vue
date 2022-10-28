<template>
    <section id="featured-doctors">
        <BaseJumbotron class="d-flex align-items-center justify-content-center">
            <div>
                <BaseSelect
                    @doctors-for-specialty="fetchDoctorsBySpecialist"
                    :specialties="specialties"
                    text="Scegli una specializzazione"
                />
                ciaooo siamo in featured
            </div>
        </BaseJumbotron>
        <ul class="container">
            <li v-for="user in users" :key="user.key">
                <div class="card" style="width: 18rem">
                    <img src="" class="card-img-top" alt="" />
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ user.name }}
                        </h5>
                        <p class="card-text">
                            <span
                                >Laurea in Medicina con specializzazione in
                            </span>
                            <span
                                v-for="(specialty, index) in user.specialties"
                                :key="specialty.id"
                                >{{ specialty.label }}
                                <span v-if="index === user.specialties.length"
                                    >.</span
                                >
                                <span v-else>,</span>
                            </span>
                        </p>
                    </div>
                    <!-- <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div> -->
                </div>
            </li>
        </ul>
    </section>
</template>

<script>
import BaseJumbotron from "../BaseJumbotron.vue";
export default {
    name: "FeaturedDoctors",
    components: {
        BaseJumbotron,
    },
};
</script>

<style lang="scss" scoped></style>
