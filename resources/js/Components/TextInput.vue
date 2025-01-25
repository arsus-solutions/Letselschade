<script setup>
import { onMounted, ref } from "vue";

const model = defineModel({
    type: String,
    required: true,
});

const props = defineProps({
    label: {
        type: String,
        default: "",
    },
    type: {
        type: String,
        default: "text",
    },
    name: {
        type: String,
        default: "",
    },
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="mb-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        v-model="model"
        ref="input"
        :placeholder="label"
        :type="type"
        :id="name"
    />
</template>
