<template>
    <div class="input-group">
        <select
            class="custom-select"
            id="specialty"
            aria-label="Example select with button addon"
        >
            <option selected>Seleziona una specializzazione</option>
            <option
                :value="specialty.id"
                v-for="specialty in specialties"
                :key="specialty.id"
            >
                {{ specialty.label }}
            </option>
        </select>
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">
                Filtra
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "BaseSelect",
    data() {
        return {
            specialties: [],
        };
    },
    methods: {
        fetchSpecialties() {
            axios.get("http://127.0.0.1:8000/api/specialties").then((res) => {
                this.specialties = res.data.specialties;
            });
        },
    },
    mounted() {
        this.fetchSpecialties();
    },
};
</script>

<style lang="scss" scoped></style>
