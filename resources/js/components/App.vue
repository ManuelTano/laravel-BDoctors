<template>
    <div class="position-relative">
        <AppHeader />
        <router-view></router-view>
        <BaseFooter />
    </div>
</template>

<script>
import AppHeader from "./AppHeader.vue";
import BaseFooter from "./BaseFooter.vue";
import BaseSelect from "./BaseSelect.vue";

export default {
    name: "App",
    components: {
        AppHeader,
        BaseFooter,
        BaseSelect,
    },
    data() {
        return {
            users: [],
            specialties: [],
        };
    },
    methods: {
        // fetchUsersByInput(search) {
        //     axios
        //         .get("http://127.0.0.1:8000/api/users/specialty/" + search)
        //         .then((res) => {
        //             this.users = res.data.users;
        //         });
        // },

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

<style lang="scss"></style>
