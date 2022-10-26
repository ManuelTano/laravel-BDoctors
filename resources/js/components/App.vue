<template>
    <div>
        <AppHeader />
        <AppMain @my-search="myQuery" />
    </div>
</template>

<script>
import AppHeader from './AppHeader.vue';
import AppMain from './AppMain.vue'


export default {
    name: "App",
    components: {
        AppHeader,
        AppMain,
    },
    data() {
        return {
            users: [],
            query: '',
        }
    },
    methods: {
        myQuery(query) {
            this.query = query
            axios.get(`http://127.0.0.1:8000/api/users/${this.query}`).then((res) => {
                this.users = res.data
            })
        }
    },
}
</script>
