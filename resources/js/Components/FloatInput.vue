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
    error: {
        type: Boolean,
        default: false,
    },
});
</script>

<template>
    <div class="relative z-0">
        <div class="relative mb-3">
            <textarea
                v-if="type === 'textarea'"
                :id="name"
                v-model="model"
                class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-lg text-gray-900 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                :class="error ? ' border-red-500' : ''"
                rows="5"
                placeholder=" "
            ></textarea>
            <input
                v-else
                :type="type"
                :id="name"
                v-model="model"
                class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-lg text-gray-900 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                :class="error ? ' border-red-500' : ''"
                placeholder=" "
            />
            <label
                :for="name"
                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto"
                :class="error ? ' text-red-500' : ''"
                @click="this.previousElementSibling.focus()"
                >{{ label }}</label
            >
        </div>
    </div>
</template>
