<template>
    <section id="app-card">
        <div class="card my-4" style="width: 18rem">
            <img src="" class="card-img-top" alt="" />
            <div class="card-body">
                <h5 class="card-title">
                    {{ user.first_name + " " + user.last_name }}
                </h5>
                <p class="card-text"></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">media: {{ user.media }}</li>
                <li class="list-group-item">
                    review: {{ user.numero_recensioni }}
                </li>
                <li class="list-group-item">A third item</li>
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "AppCard",

    props: {
        user: Object,
    },
    created() {
        console.log(this.user);
    },
};
</script>

<style leng="scss"></style>
