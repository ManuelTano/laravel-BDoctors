<template>
    <section id="doctors-view">
        <div class="container">
            <AppCard v-for="user in users" :key="user.id" :user="user" />
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
