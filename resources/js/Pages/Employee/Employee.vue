<template>
    <Head title="Employee Page" />
    <Frontend>
        <section class="px-4 py-20 md:pl-72 md:py-8 md:pr-8 h-full">
            <h1 class="text-3xl font-semibold">Employee</h1>
            <p
                v-if="$page.props.flash.success"
                class="py-4 bg-green-200 mt-4 rounded-sm text-sm text-green-800 px-4"
            >
                {{ $page.props.flash.success }}
            </p>
            <Table :employees="employees" />
        </section>
    </Frontend>
</template>

<script setup>
import Frontend from "@/Layouts/FrontendLayout.vue";
import Table from "@/Components/Table.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
    employees: [Object, Array],
});
</script>
