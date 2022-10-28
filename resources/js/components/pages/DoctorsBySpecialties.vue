<template>
    <div class="container">
        <BaseSelect @doctors-for-specialty="fetchDoctorsBySpecialist" />
        <ul>
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
    </div>
</template>

<script>
import BaseSelect from "../BaseSelect.vue";
export default {
    name: "DoctorsBySpecialties",
    components: {
        BaseSelect,
    },
    data() {
        return {
            users: [],
            query: "",
        };
    },
    methods: {
        fetchDoctorsBySpecialist(choice) {
            this.query = choice;
            axios
                .get("http://127.0.0.1:8000/api/users/specialty/" + choice)
                .then((res) => {
                    this.users = res.data.users_by_specialty;
                });
        },
    },
};
</script>

<style lang="scss" scoped></style>
