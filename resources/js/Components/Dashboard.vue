<template>
    <div
        class="mt-14 bg-white shadow-md px-4 py-8 rounded-lg grid grid-cols-1 md:grid-cols-2 gap-x-0 gap-y-4 md:gap-y-0 md:gap-x-4"
    >
        <div
            class="bg-pink-500 w-full h-full py-6 px-6 rounded-lg flex flex-col gap-8"
        >
            <p class="text-white text-xs md:text-sm">Total Wages</p>
            <h2 class="text-white text-2xl md:text-3xl">
                {{ rupiah(totalSalary) }}
            </h2>
        </div>
        <div
            class="bg-green-500 w-full h-full py-6 px-6 rounded-lg flex flex-col gap-8"
        >
            <p class="text-white text-xs md:text-sm">Number of employees</p>
            <h2 class="text-white text-2xl md:text-3xl">
                {{ totalEmployees }} Employees
            </h2>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    totalSalary: Number,
    totalEmployees: Number,
});

const rupiah = (number) => {
    const formatMoney = new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
    }).format(number);
    return formatMoney;
};
</script>
