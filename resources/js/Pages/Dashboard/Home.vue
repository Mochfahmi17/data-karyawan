<template>
    <Head title="Home Page" />
    <Frontend>
        <section class="px-4 py-20 md:pl-72 md:py-8 md:pr-8 h-screen">
            <h1 class="text-3xl font-semibold">Dashboard</h1>
            <Dashboard
                :totalSalary="totalSalary"
                :totalEmployees="totalEmployees"
            />
        </section>
    </Frontend>
</template>

<script setup>
import Frontend from "@/Layouts/FrontendLayout.vue";
import Dashboard from "@/Components/Dashboard.vue";
import { Head } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    allSalary: [Object, Array],
});

const totalSalary = computed(() => {
    const allData = props.allSalary.map((item) => item.base_salary);
    const salary = allData.reduce((total, item) => {
        const numbers = parseInt(item);
        return total + (isNaN(numbers) ? 0 : numbers);
    }, 0);
    return salary;
});

const totalEmployees = computed(() => {
    return props.allSalary.filter((item) => item.name).length;
});
</script>
