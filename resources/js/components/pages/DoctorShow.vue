<template>
    <div>

    </div>

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