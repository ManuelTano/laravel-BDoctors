<template>
    <div>
        <AppHeader />
        <AppMain @my-search="myQuery" :users="users" />
    </div>
</template>

<script>
import AppHeader from './AppHeader.vue';
import AppMain from './AppMain.vue';


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
        myQuery() {
            axios.get(`http://127.0.0.1:8000/api/users`).then((res) => {
                this.users = res.data
            })
        }
    },
    mounted() {
        this.myQuery();
    }
}
</script>
