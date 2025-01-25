<template>
    <div class="btn-radio inline-flex">
        <label
            v-for="(option, i) in options"
            :key="i"
            :class="getClass(option.value)"
            class="cursor-pointer px-8 py-4 border border-gray-300 font-bold"
            :for="`${variable}_${i}`"
        >
            <input
                type="radio"
                :value="option.value"
                :checked="option.value === selectedValue"
                class="sr-only"
                @change="radioValue(option.value)"
                :id="`${variable}_${i}`"
            />
            {{ option.label }}
        </label>
    </div>
</template>

<script>
export default {
    data() {
        return {};
    },
    props: {
        options: {
            type: Array,
            required: true,
        },
        variable: {
            type: String,
            required: true,
        },
        selectedValue: {
            required: true,
        },
    },
    emits: ["update:selectedValue"],
    methods: {
        getClass(option) {
            return this.selectedValue === option
                ? "bg-blue-900 text-white border-blue-950"
                : "bg-white text-gray-700";
        },
        radioValue(value) {
            this.$emit("update:selectedValue", this.variable, value);
        },
    },
};
</script>
