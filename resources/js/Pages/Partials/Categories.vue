<template>
    <div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-5">
        <Link
            v-for="(category, i) in categories"
            :key="i"
            :href="`/letselschadetest/${category.id}-${category.slug}`"
            :class="
                `btn-category` +
                (selected === category.slug ? ' active cursor-not-allowed' : '')
            "
        >
            <img
                :src="`/assets/images/categories/${category.slug}.jpg`"
                :alt="category.slug"
            />
            <span class="name">
                {{ category.name }}
            </span>
        </Link>
    </div>
</template>

<script>
import { Link, usePage } from "@inertiajs/vue3";

export default {
    name: "Categories",
    components: { Link, usePage },
    created() {
        const page = usePage();
        const slug = page.props.selectedCategory;
        if (slug) {
            const catData = slug.split("-");
            this.selected = catData[1];
        }
    },
    data() {
        return {
            selected: null,
            categories: [
                {
                    id: 1,
                    slug: "verkeersongeval",
                    name: "Verkeersongeval",
                },
                {
                    id: 2,
                    slug: "bedrijfsongeval",
                    name: "Bedrijfsongeval",
                },
                {
                    id: 5,
                    slug: "dieren",
                    name: "Ongeval door dieren",
                },
                {
                    id: 7,
                    slug: "wegdek",
                    name: "Ongeval door gebrek wegdek",
                },
            ],
        };
    },
};
</script>
