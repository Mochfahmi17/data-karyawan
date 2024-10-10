<template>
    <div class="mt-14">
        <div class="relative bg-white overflow-x-auto shadow-md sm:rounded-lg">
            <div
                class="p-4 sticky left-0 flex items-center justify-between md:justify-normal bg-white dark:bg-gray-900"
            >
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div
                        class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none"
                    >
                        <svg
                            class="w-4 h-4 text-gray-500 dark:text-gray-400"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 20 20"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                            />
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="table-search"
                        class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-48 md:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search employee"
                    />
                </div>
                <div class="ml-4 mt-1">
                    <Link
                        :href="route('employees.create')"
                        class="bg-orange-500 hover:bg-orange-600 px-2 py-2 md:px-4 text-sm text-nowrap md:text-base md:text-wrap text-white rounded-lg"
                        >Input Employee</Link
                    >
                </div>
            </div>

            <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            >
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                    <tr>
                        <th scope="col" class="p-4">No</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">
                            Employee Identification Number (EIN)
                        </th>
                        <th scope="col" class="px-6 py-3">Position</th>
                        <th scope="col" class="px-6 py-3">
                            Department/Division
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Start Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Employment Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Base Salary
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Bank Account
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 sticky right-0 bg-gray-50"
                        >
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="text-xs md:text-sm">
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 group"
                        v-for="(employee, i) in employees"
                        :key="i"
                    >
                        <th
                            scope="row"
                            class="w-4 p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                            {{ number++ }}
                        </th>
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                            {{ employee.name }}
                        </th>
                        <td class="px-6 py-4">{{ employee.ein }}</td>
                        <td class="px-6 py-4 text-nowrap">
                            {{ employee.position }}
                        </td>
                        <td class="px-6 py-4">
                            {{ employee.departmen_division }}
                        </td>
                        <td class="px-6 py-4 text-nowrap">
                            {{ formatDate(employee.start_date) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ employee.employment_status }}
                        </td>
                        <td class="px-6 py-4 text-wrap">
                            {{ rupiah(employee.base_salary) }}
                        </td>
                        <td class="px-6 py-4">{{ employee.bank_account }}</td>
                        <td
                            class="px-6 py-4 flex items-center gap-4 sticky right-0 bg-white group-hover:bg-gray-50"
                        >
                            <Link
                                :href="route('employees.edit', employee.id)"
                                class="font-medium text-black hover:text-orange-600 text-xl hover:underline"
                                ><i class="fa-regular fa-pen-to-square"></i
                            ></Link>
                            <button
                                type="submit"
                                @click="deleteEmployee(employee.id)"
                                class="font-medium text-black hover:text-orange-600 text-xl hover:underline"
                            >
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import { Link, useForm } from "@inertiajs/vue3";

const formatDate = (date) => {
    const tanggal = new Date(date);
    const formatDate = tanggal.toDateString();
    return formatDate;
};

const rupiah = (number) => {
    const formatMoney = new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
    }).format(number);
    return formatMoney;
};

const number = 1;

defineProps({
    employees: [Object, Array],
});

const form = useForm({});

const deleteEmployee = (employeeId) => {
    if (confirm("Do you want to delete this employee ?")) {
        form.delete(route("employees.destroy", employeeId));
    }
};
</script>
