<template>
    <section id="advanced-search">
        <BaseJumbotron />
        <AppMain :users="users" />
    </section>
</template>
<script>
import AppMain from "../AppMain.vue";
import BaseJumbotron from "../BaseJumbotron.vue";
export default {
    name: "AdvancedSearch",
    components: {
        BaseJumbotron,
        AppMain,
    },
    data() {
        return {
            users: [],
            query: this.$route.params.query,
        };
    },
    methods: {
        // fetchDoctorsBySpecialty() {
        //     axios
        //         .get("http://127.0.0.1:8000/api/users")
        //         .then((res) => {
        //             this.users = res.data;
        //             console.log("chiamata fatta");
        //             console.log(res.data);
        //             console.log(this.query);
        //         })
        //         .catch((err) => {
        //             console.log("Errorrrrrr");
        //         });
        // },
    },
    mounted() {
        // this.fetchDoctorsBySpecialty();
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
