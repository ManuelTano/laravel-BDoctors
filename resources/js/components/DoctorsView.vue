<template>
    <section id="doctors-view">
        <div class="container">
            <ul>
                <li v-for="user in users" :key="user.id">
                    <div class="card" style="width: 18rem">
                        <!-- <img src="" class="card-img-top" alt="" /> -->
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ user.name }}
                            </h5>
                            <p class="card-text">
                                <span
                                    >Laurea in Medicina con specializzazione in
                                </span>
                                <span
                                    v-for="(
                                        specialty, index
                                    ) in user.specialties"
                                    :key="specialty.id"
                                    >{{ specialty.label }}
                                    <span
                                        v-if="index === user.specialties.length"
                                        >.</span
                                    >
                                    <span v-else>,</span>
                                </span>
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <address>
                                    <i class="fa-solid fa-house mr-2"></i>
                                    {{ user.address + "  " + user.city }}
                                </address>
                            </li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
</template>

<script>
export default {
    name: "DoctorsView",
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
