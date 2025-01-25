<template>
    <div>
        <h3 class="text-center font-title">
            Stuur uw vragen en/ of opmerkingen op
        </h3>
        <form @submit.prevent="submit">
            <InputLabel for="firstname" value="Name" />
            <div class="flex gap-5 mb-3">
                <div>
                    <Checkbox
                        type="radio"
                        value="m"
                        name="gender"
                        :checked="true"
                    />
                    Dhr.
                </div>
                <div>
                    <Checkbox
                        type="radio"
                        value="f"
                        name="gender"
                        v-model="contactData.gender"
                        :checked="false"
                    />
                    Mevr.
                </div>
            </div>
            <div class="lg:grid grid-cols-2 gap-3">
                <FloatInput
                    name="firstname"
                    label="Voornaam"
                    type="text"
                    v-model="contactData.firstname"
                    :error="this.invalids.includes('firstname')"
                    @input="valid()"
                />
                <FloatInput
                    name="lastname"
                    label="Achternaam"
                    type="text"
                    v-model="contactData.lastname"
                    :error="this.invalids.includes('lastname')"
                    @input="valid()"
                />
            </div>
            <div class="lg:grid grid-cols-2 gap-3">
                <FloatInput
                    name="email"
                    label="E-mailadres"
                    type="email"
                    v-model="contactData.email"
                    :error="this.invalids.includes('email')"
                    @input="valid()"
                />
                <FloatInput
                    name="phone"
                    label="Telefoonnummer"
                    type="tel"
                    v-model="contactData.phone"
                    :error="this.invalids.includes('phone')"
                    @input="valid()"
                />
            </div>
            <div class="my-3">
                <label for="subject" class="block"
                    >Waar gaat uw vraag/opmerking over</label
                >
                <select
                    @change="valid()"
                    id="subject"
                    class="mt-1 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-800 focus:border-blue-800 sm:text-sm rounded-md w-full"
                    :class="
                        this.invalids.includes('subject')
                            ? ' border-red-500'
                            : ''
                    "
                    v-model="contactData.subject"
                >
                    <option
                        v-for="option in subjects"
                        :key="option"
                        :value="option.value"
                    >
                        {{ option.label }}
                    </option>
                </select>
            </div>
            <div>
                <FloatInput
                    name="details"
                    label="Stel een vraag of maak een opmerking"
                    type="textarea"
                    v-model="contactData.details"
                    :error="this.invalids.includes('details')"
                    @input="valid()"
                />
            </div>
            <PrimaryButton
                class="text-xl text-center mt-5 py-4 w-full"
                @click="submit()"
                >Verzenden</PrimaryButton
            >
        </form>
    </div>
</template>

<script>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import FloatInput from "@/Components/FloatInput.vue";
import Checkbox from "@/Components/Checkbox.vue";
import Select from "@/Components/Select.vue";
import { useForm } from "@inertiajs/vue3";

export default {
    name: "Contact Form",
    components: {
        InputError,
        InputLabel,
        PrimaryButton,
        TextInput,
        FloatInput,
        Checkbox,
        Select,
        useForm,
    },
    data() {
        return {
            contactData: {
                gender: "m",
                firstname: "",
                lastname: "",
                email: "",
                phone: "",
                subject: "",
                details: "",
            },
            subjects: [
                { label: "", value: "" },
                { label: "Technische problemen", value: 8 },
                { label: "Onze vestigingen/ letselschade adviseurs", value: 9 },
                { label: "Letselschadebehandelaar", value: 10 },
                { label: "Overig", value: 11 },
            ],
            invalids: [],
        };
    },
    methods: {
        valid() {
            this.invalids = [];
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const phonePattern = /^[+-]?[0-9-\s]+$/;
            Object.keys(this.contactData).forEach((key) => {
                const value = this.contactData[key];

                // Check for null or empty values
                if (!value || value === "") {
                    this.invalids.push(key);
                }
                if (
                    key === "email" &&
                    (!value || value === "" || !emailPattern.test(value))
                ) {
                    this.invalids.push(key);
                }
                if (
                    key === "phone" &&
                    (!value ||
                        value === "" ||
                        !phonePattern.test(value) ||
                        value.length < 8 ||
                        value.length > 15)
                ) {
                    this.invalids.push(key);
                }
            });

            if (this.invalids.length > 0) {
                return false;
            }

            return true;
        },
        submit() {
            if (this.valid()) {
                console.log(this.contactData);
            }
        },
    },
};
</script>
