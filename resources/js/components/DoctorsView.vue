<template>
    <section id="doctors-view ">
        <div class="container">
            <div
                class="d-flex justify-content-start flex-wrap align-items-start m-0 p-0 mt-5"
            >
                <AppCard
                    v-for="(user, index) in users"
                    :key="index"
                    :user="user"
                    :specialty="specialty"
                    class="col-4"
                />
            </div>
        </div>
    </section>
</template>

<script>
import AppCard from "./AppCard.vue";
export default {
    name: "DoctorsView",
    components: {
        AppCard,
    },
    props: {
        users: Array,
        specialty: Number,
    },
};
</script>

<style lang="scss" scoped></style>
