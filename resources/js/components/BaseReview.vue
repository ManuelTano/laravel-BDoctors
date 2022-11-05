<template>
    <section id="base-review">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between">
                    <h5>{{ review.first_name + " " + review.last_name }}</h5>
                    <VoteReview :rating="review.rating" />
                </div>
                <p class="card-text">{{ review.feedback }}</p>
            </div>
        </div>
    </section>
</template>

<script>
import VoteReview from "../components/VoteReview.vue";
export default {
    name: "BaseReview",
    props: {
        review: Object,
    },
    components: {
        VoteReview,
    },
};
</script>

<style lang="scss" scoped>
#base-review {
    padding: 10px;

    .card {
        border: 1px solid #80b9e8;
        border-radius: 20px;
    }
}
</style>
