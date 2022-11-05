<template>
    <section id="reviews-list">
        <BaseReview
            class="my-3"
            v-for="(review, index) in reviews"
            :key="index"
            :review="review"
        />
    </section>
</template>

<script>
import BaseReview from "../components/BaseReview.vue";
export default {
    name: "ReviewsList",
    components: {
        BaseReview,
    },
    props: {
        reviews: Array,
    },
};
</script>

<style lang="scss" scoped></style>
