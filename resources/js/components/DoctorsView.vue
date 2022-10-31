<template>
    <section id="doctors-view">
        <div class="container">
            <div class=" d-flex flex-wrap justify-content-center align-items-start  ">
                <AppCard v-for="user in users" :key="user.id" :user="user" />
            </div>
        </div>
    </section>
</template>

<script>
import AppCard from "./AppCard.vue"
export default {
    name: "DoctorsView",
    components: {
        AppCard,
    },
    props: {
        users: Array,
    },
};

</script>

<style lang="scss" scoped>
// .container {
//     display: flex;
//     flex-wrap: wrap;
//     margin: 0 auto;
//     margin-right: 8rem;
// }
</style>
