<template>
    <section id="homepage">
        <BaseJumbotron class="d-flex align-items-center justify-content-center">
            <div>
                <BaseSelect
                    @doctors-for-specialty="fetchDoctorsBySpecialist"
                    :specialties="specialties"
                    text="Scegli una specializzazione"
                />
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
import BaseSelect from "../BaseSelect.vue";
import BaseJumbotron from "../BaseJumbotron.vue";
export default {
    name: "HomePage",
    components: {
        BaseSelect,
        BaseJumbotron,
        query: "",
    },
    data() {
        return {
            specialties: [],
            users: [],
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
        fetchSpecialties() {
            axios.get("http://127.0.0.1:8000/api/specialties").then((res) => {
                this.specialties = res.data.specialties;
            });
        },
    },
    mounted() {
        this.fetchSpecialties();
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
