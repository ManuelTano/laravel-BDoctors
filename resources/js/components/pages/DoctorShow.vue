<template>

    <section id="doctorshow">
        <BaseJumbotron class="d-flex align-items-center justify-content-between">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="mb-5">
                            <span class="title"> Cerca un </span><span class="wordchanger"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <BaseSelect @doctors-for-specialty="fetchDoctorsBySpecialist" :specialties="specialties"
                            text="Scegli un dottore" />
                    </div>
                </div>
            </div>
        </BaseJumbotron>
    </section>
</template>

<script>
import BaseJumbotron from '../BaseJumbotron.vue';
import BaseSelect from '../BaseSelect.vue';
export default {
    name: "DoctorShow",
    props: {
        specialties: Array,
        text: String,
    },
    components: {
        BaseJumbotron,
        BaseSelect
    },
    data() {
        return {
            choice: "",
        };
    },
    methods: {
        emitQuery() {
            this.$emit("doctors-for-specialty", this.choice);
        },
    },
};

</script>

<style>

</style>