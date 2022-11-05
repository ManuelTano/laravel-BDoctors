<template>
    <li class="d-flex align-items-center desc">
        <div v-if="rating === 5">
            <i class="fa-solid fa-star" v-for="star in 5" :key="star + 'a'"></i>
        </div>
        <div v-else>
            <i
                class="fa-solid fa-star"
                v-for="star in rating"
                :key="star + 'c'"
            ></i>
            <i
                class="fa-regular fa-star"
                v-for="star in 5 - rating"
                :key="star + 'd'"
            ></i>
        </div>
    </li>
</template>

<script>
export default {
    name: "VoteReview",
    props: {
        rating: Number,
    },
};
</script>

<style lang="scss" scoped>
// Ogni descrizione ha un pò d'aria
.desc {
    padding: 5px 10px;

    color: gold;

    p {
        font-weight: bold;
    }
}
</style>
