<template>
    <div
        class="absolute flex justify-between items-center w-full mt-7 px-4 z-20 md:hidden"
        :class="{ 'pl-2': menu }"
    >
        <button
            @click="showMenu"
            class="w-5 h-4 flex flex-col justify-between transition-all"
            :class="{ 'translate-x-52': menu, 'translate-x-0': !menu }"
        >
            <span
                class="w-1/2 h-[2px] bg-black origin-right"
                :class="{ 'w-full -rotate-45': menu }"
            ></span>
            <span
                class="w-full h-[2px] bg-black"
                :class="{ 'scale-0': menu, 'scale-100': !menu }"
            ></span>
            <span
                class="w-1/2 h-[2px] bg-black origin-right"
                :class="{ 'w-full rotate-45': menu }"
            ></span>
        </button>
        <img :src="logo" alt="" class="w-5" />
    </div>
    <header
        class="left-0 top-0 bottom-0 w-64 z-10 px-8 py-7 fixed md:translate-x-0 bg-white transition-all"
        :class="{
            'translate-x-0': menu,
            '-translate-x-full': !menu,
        }"
    >
        <div class="flex flex-col gap-8">
            <Link :href="route('home')" class="flex items-center gap-2">
                <img :src="logo" alt="" class="w-6" />
                <h2 class="font-aldrich text-xs font-bold text-slate-700">
                    TECH COMPANY
                </h2>
            </Link>
            <nav class="flex flex-col gap-4">
                <h3 class="text-slate-400 text-xs font-medium">Main Menu</h3>
                <ul class="flex flex-col gap-3">
                    <li
                        class="text-sm font-medium group text-slate-700 hover:text-orange-500"
                    >
                        <Link
                            :href="route('home')"
                            class="flex items-center gap-2"
                            :class="{
                                'text-orange-500': $page.url === '/',
                            }"
                            ><i
                                class="fa-solid fa-house"
                                :class="{
                                    'text-orange-500': $page.url === '/',
                                    'text-slate-500 group-hover:text-orange-600':
                                        $page.url !== '/',
                                }"
                            ></i
                            >Dashboard</Link
                        >
                    </li>
                    <li
                        class="text-sm font-medium text-slate-700 group hover:text-orange-500"
                        :class="{
                            'text-orange-500': $page.url === '/employees',
                        }"
                    >
                        <Link
                            :href="route('employees.index')"
                            class="flex items-center gap-2"
                            :class="{
                                'text-orange-500 group':
                                    $page.url === '/employees',
                            }"
                            ><i
                                class="fa-solid fa-users"
                                :class="{
                                    'text-orange-500':
                                        $page.url === '/employees',
                                    'text-slate-500 group-hover:text-orange-600':
                                        $page.url !== '/employees',
                                }"
                            ></i
                            >Employee</Link
                        >
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import logo from "@/assets/image/logo.png";
import { ref } from "vue";

const menu = ref(false);

const showMenu = () => {
    menu.value = !menu.value;
};
</script>
