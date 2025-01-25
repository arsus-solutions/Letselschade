<template>
    <div class="lg:ml-10">
        <div class="menu-toggle-wrapper absolute right-7 top-8 lg:hidden">
            <button
                class="mr-5 my-3 py-3 px-5 border border-blue-50 text-white rounded active:bg-blue-300"
                @click="isOpen = !isOpen"
            >
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <nav ref="webNav" class="main lg:flex">
            <ul
                class="navigation"
                :class="{ 'max-lg:block': isOpen, 'max-lg:hidden': !isOpen }"
            >
                <li class="max-lg:py-3" v-for="menu in menus" :key="menu.slug">
                    <NavLink
                        :href="menu.slug"
                        :active="
                            activeLink.replace(/\/.*/, '') ===
                                'letselschadetest' &&
                            menu.slug === '/letselschadetest'
                        "
                        >{{ menu.name }}</NavLink
                    >
                </li>
            </ul>
            <a href="tel:0880767676" class="phone"
                ><i class="fas fa-phone mr-2"></i
                ><span class="hotline">088 - 076 76 76</span></a
            >
        </nav>
    </div>
</template>

<script>
import NavLink from "@/Components/NavLink.vue";
import { usePage } from "@inertiajs/vue3";

export default {
    name: "Navigation",
    components: { NavLink, usePage },
    created() {
        const page = usePage();
        this.activeLink = page.props.activeLink;
        console.log(this.activeLink.replace(/\/.*/, ""));
    },
    data() {
        return {
            activeLink: "",
            isOpen: false,
            displayNav: true,
            menus: [
                {
                    slug: "/",
                    name: "Home",
                },
                {
                    slug: "/letselschadetest",
                    name: "Letselschadetest",
                },
                {
                    slug: "/letselschadeclaimen",
                    name: "Letselschade Claimen",
                },
                {
                    slug: "/contact",
                    name: "Contact",
                },
            ],
        };
    },
};
</script>
