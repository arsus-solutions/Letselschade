<template>
    <div class="banner relative">
        <img
            src="/assets/images/header.png"
            alt="Letselscade Test"
            class="w-full border-none outline-none"
        />
        <div class="xl:absolute w-full h-full left-0 top-0 z-1">
            <div class="container mx-auto relative h-full">
                <div
                    class="my-10 p-5 backdrop-blur-md bg-white/30 rounded-lg 2xl:text-2xl xl:text-white font-title shadow-lg xl:inline-block"
                >
                    <ul class="fa-ul max-2xl:grid md:grid-cols-3 gap-5">
                        <li class="drop-shadow">
                            <span class="fa-li"
                                ><i
                                    class="fa-solid fa-check text-green-500"
                                ></i></span
                            >snel - de letselschade-expert neemt contact met u
                            op
                        </li>
                        <li class="drop-shadow">
                            <span class="fa-li"
                                ><i
                                    class="fa-solid fa-check text-green-500"
                                ></i></span
                            >makkelijk - korte vragen
                        </li>
                        <li class="drop-shadow">
                            <span class="fa-li"
                                ><i
                                    class="fa-solid fa-check text-green-500"
                                ></i></span
                            >direct uitslag van de test - via email
                        </li>
                        <li class="drop-shadow">
                            <span class="fa-li"
                                ><i
                                    class="fa-solid fa-check text-green-500"
                                ></i></span
                            >gratis en vrijblijvend advies
                        </li>
                        <li class="drop-shadow">
                            <span class="fa-li"
                                ><i
                                    class="fa-solid fa-check text-green-500"
                                ></i></span
                            >beschikken over een landelijke dekking
                        </li>
                    </ul>
                </div>
                <div
                    class="bg-white rounded-t-xl px-10 py-3 xl:absolute bottom-0 left-0 xl:w-1/2"
                >
                    <h3
                        class="text-3xl text-cyan-900 mt-5 font-title font-black"
                    >
                        Start de letselschadetest
                    </h3>
                    <p class="mb-5 font-bold">
                        Wat is de aard van uw ongeval?
                        <span class="text-slate-400"
                            >(Kies &eacute;&eacute;n)</span
                        >
                    </p>
                    <Categories />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Categories from "./Categories.vue";

export default {
    name: "Banner",
    components: { Categories },
};
</script>
