<template>
    <div class="py-10">
        <div class="">
            <h2 class="font-logo mb-2 text-3xl text-blue-900">Overig</h2>
            <ul class="text-2xl fa-ul">
                <li>
                    <span class="fa-li"
                        ><i
                            class="fa-solid fa-check-square text-green-800"
                        ></i></span
                    >Voor het beste advies nemen we graag telefonisch contact op
                </li>
            </ul>
        </div>
        <div class="py-5">
            <div class="">
                <div class="border rounded-lg shadow-lg p-5 mb-8">
                    <h3 class="font-logo mb-2 text-xl text-blue-900">
                        Contact gegevens
                    </h3>
                    <div class="lg:grid grid-cols-3">
                        <label for="gender" class="self-center"
                            >Voor -/ achternaam:</label
                        >
                        <div class="lg:flex gap-1 col-span-2">
                            <div class="mb-3">
                                <radio-group
                                    :options="genders"
                                    @update:selectedValue="handleRadio"
                                    :selectedValue="webreaction.gender"
                                    variable="gender"
                                />
                            </div>
                            <TextInput
                                v-model="webreaction.firstname"
                                label="Voornaam"
                                :class="
                                    invalidFields.length &&
                                    invalidFields.includes('firstname')
                                        ? ' border-red-700 error-field'
                                        : ''
                                "
                            />
                            <TextInput
                                v-model="webreaction.lastname"
                                label="Achternaam"
                                :class="
                                    invalidFields.length &&
                                    invalidFields.includes('lastname')
                                        ? ' border-red-700 error-field'
                                        : ''
                                "
                            />
                        </div>
                    </div>
                    <div class="lg:grid grid-cols-3">
                        <label for="postal_code_id" class="self-center"
                            >Postcode / Huisnummer:</label
                        >
                        <div
                            class="col-span-2 grid lg:grid-cols-10 grid-cols-5 gap-1"
                        >
                            <div class="col-span-2">
                                <TextInput
                                    v-model="webreaction.postal_code_id"
                                    label="1234"
                                    name="postal_code_id"
                                    :class="
                                        invalidFields.length &&
                                        invalidFields.includes('postal_code_id')
                                            ? ' border-red-700 error-field'
                                            : ''
                                    "
                                />
                            </div>
                            <TextInput
                                v-model="webreaction.postal_code_letters"
                                label="AB"
                                name="postal_code_letters"
                                :class="
                                    invalidFields.length &&
                                    invalidFields.includes(
                                        'postal_code_letters'
                                    )
                                        ? ' border-red-700 error-field'
                                        : ''
                                "
                            />
                            <div class="col-span-2">
                                <TextInput
                                    v-model="webreaction.house_number"
                                    label="12a"
                                    name="house_number"
                                    :class="
                                        invalidFields.length &&
                                        invalidFields.includes('house_number')
                                            ? ' border-red-700 error-field'
                                            : ''
                                    "
                                />
                            </div>
                        </div>
                    </div>
                    <div class="lg:grid grid-cols-3">
                        <label for="email" class="self-center"
                            >Emailadres:</label
                        >
                        <div class="col-span-2">
                            <TextInput
                                v-model="webreaction.email"
                                label="Bijv.: email@gmail.com"
                                type="email"
                                name="email"
                                :class="
                                    invalidFields.length &&
                                    invalidFields.includes('email')
                                        ? ' border-red-700 error-field'
                                        : ''
                                "
                            />
                        </div>
                    </div>
                    <div class="lg:grid grid-cols-3">
                        <label for="telephone" class="self-center"
                            >Telefoonnummer:</label
                        >
                        <div class="col-span-2">
                            <TextInput
                                v-model="webreaction.telephone"
                                label="Telefoonnummer"
                                name="telephone"
                                :class="
                                    invalidFields.length &&
                                    invalidFields.includes('telephone')
                                        ? ' border-red-700 error-field'
                                        : ''
                                "
                            />
                        </div>
                    </div>
                    <div class="grid grid-cols-3 max-md:grid-cols-2 mb-3">
                        <label for="availableTime" class="self-center"
                            >Wanneer bent u het beste te bereiken?:</label
                        >
                        <div class="lg:col-span-2">
                            <Select
                                :selected="webreaction.availableTime"
                                :options="availableTimes"
                                name="availableTime"
                                @update:selected="handleSelection"
                                variable="availableTime"
                            />
                        </div>
                    </div>
                    <div class="lg:grid grid-cols-3">
                        <label for="details" class="self-center"
                            >Eventuele vragen en/ of opmerkingen:</label
                        >
                        <div class="col-span-2">
                            <TextInput
                                v-model="webreaction.details"
                                label="Uw vraag / opmerkingen"
                                type="text"
                                name="details"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Categories from "../../Partials/Categories.vue";
import RadioGroup from "@/Components/RadioGroup.vue";
import Checkbox from "@/Components/Checkbox.vue";
import TextInput from "@/Components/TextInput.vue";
import Select from "@/Components/Select.vue";

export default {
    name: "Step 4",
    components: {
        Categories,
        RadioGroup,
        TextInput,
        Checkbox,
        Select,
    },
    props: {
        webreaction: {
            type: Object,
            required: true,
        },
        invalidFields: {
            type: Array,
            required: true,
        },
        scrollTo: {
            type: Function,
        },
    },
    created() {
        this.getTimes();
    },
    emits: ["update:selectedValueWebreaction", "update:selectedOption"],
    watch: {
        invalidFields(newValue, oldValue) {
            console.log(newValue);
        },
    },
    data() {
        return {
            genders: [
                {
                    label: "Dhr.",
                    value: "m",
                },
                {
                    label: "Mw.",
                    value: "f",
                },
            ],
            availableTimes: [],
        };
    },
    methods: {
        handleRadio(model, value) {
            this.$emit("update:selectedValueWebreaction", model, value);
        },
        handleSelection(model, value) {
            this.$emit("update:selectedOption", model, value);
        },
        getTimes() {
            const start = new Date(`1970-01-01T09:00:00`);
            const end = new Date(`1970-01-01T15:30:00`);
            const slots = [];
            const increment = 30 * 60000; // convert interval to milliseconds

            for (
                let time = start;
                time <= end;
                time = new Date(time.getTime() + increment)
            ) {
                const hours = time.getHours().toString().padStart(2, "0");
                const minutes = time.getMinutes().toString().padStart(2, "0");
                const obj = {
                    label: `${hours}:${minutes}`,
                    value: `${hours}:${minutes}`,
                };
                slots.push(obj);
            }

            this.availableTimes = slots;
        },
    },
};
</script>
