<template>
    <select
        @change="updateSelection($event)"
        :id="name"
        class="mt-1 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-800 focus:border-blue-800 sm:text-sm rounded-md"
    >
        <option v-for="option in options" :key="option" :value="option.value">
            {{ option.label }}
        </option>
    </select>
</template>

<script>
export default {
    name: "Select",
    emits: ["update:selected"],
    props: {
        options: {
            type: Array,
            required: true,
        },
        name: {
            type: String,
            required: true,
        },
        variable: {
            type: String,
            required: true,
        },
    },
    methods: {
        updateSelection(event) {
            this.$emit("update:selected", this.variable, event.target.value);
        },
    },
};
</script>
