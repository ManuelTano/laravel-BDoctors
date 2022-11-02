<template>
    <section id="advanced-search">
        <BaseJumbotron />
        <DoctorsBySpecialty />
        <BaseFooter />
    </section>
</template>
<script>
import DoctorsBySpecialty from "../DoctorsBySpecialty.vue";
import BaseFooter from "../BaseFooter.vue";
import ReviewForm from "../ReviewForm.vue";
import BaseJumbotron from "../BaseJumbotron.vue";
export default {
    name: "AdvancedSearch",
    components: {
        BaseJumbotron,
        ReviewForm,
        BaseFooter,
        DoctorsBySpecialty,
    },
    data() {
        return {};
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
