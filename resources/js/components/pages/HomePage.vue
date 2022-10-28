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
        <DoctorsView :users="users" />
    </section>
</template>

<script>
import BaseSelect from "../BaseSelect.vue";
import BaseJumbotron from "../BaseJumbotron.vue";
import DoctorsView from "../DoctorsView.vue";
export default {
    name: "HomePage",
    components: {
        BaseSelect,
        BaseJumbotron,
        DoctorsView,
    },
    data() {
        return {
            users: [],
            specialties: [],
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
