<template>
    <div class="input-group ">
        <select
            class="form-control "
            id="specialty"
            @change="emitQuery"
            v-model="choice"
        >
            <option selected value="">{{ text }}</option>
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

<style lang="scss" scoped>

#specialty {
    top: 25;
    left: 25;
}

</style>
