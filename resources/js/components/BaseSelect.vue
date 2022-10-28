<template>
    <div class="input-group">
        <select
            class="custom-select"
            id="specialty"
            aria-label="Example select with button addon"
            @change="emitQuery"
            v-model="choice"
        >
            <option selected>{{ text }}</option>
            <option
                :value="specialty.id"
                v-for="specialty in specialties"
                :key="specialty.id"
            >
                {{ specialty.label }}
            </option>
        </select>
    </div>
</template>

<script>
export default {
    name: "BaseSelect",
    props: {
        specialties: Array,
        text: String,
    },
    data() {
        return {
            choice: "",
        };
    },
    methods: {
        emitQuery() {
            this.$emit("doctors-for-specialty", this.choice);
        },
    },
};
</script>

<style lang="scss" scoped></style>
