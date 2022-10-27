<template>
    <form>
        <div class="d-flex form-group">
            <input
                type="text"
                @change="mySearch"
                v-model="search"
                class="form-control m-0 mr-2"
                placeholder="Cerca un dottore"
            />
            <button @click="mySearch" class="btn btn-primary">Cerca</button>
        </div>
    </form>
</template>

<style lang="scss"></style>

<script>
export default {
    name: "BaseInput",
    data() {
        return {
            search: "",
        };
    },
    methods: {
        mySearch() {
            this.$emit("my-search", this.search);
        },
    },
};
</script>
