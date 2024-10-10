<template>
    <Head title="Input Employee" />
    <Frontend>
        <section class="px-4 py-20 md:pl-72 md:mr-8 md:py-8 h-full">
            <div class="container bg-white px-4 py-8 rounded-lg mx-auto">
                <div class="flex justify-between items-center">
                    <h1 class="text-xl md:text-2xl font-semibold">
                        Input New Employee
                    </h1>
                    <Link
                        :href="route('employees.index')"
                        class="py-1 px-4 bg-red-600 text-white text-sm md:text-base rounded hover:bg-red-700"
                        >Back</Link
                    >
                </div>
                <form
                    @submit.prevent="saveEmployee()"
                    class="flex flex-col gap-4 md:gap-6 mt-8"
                >
                    <div
                        class="grid md:grid-cols-2 grid-cols-1 md:gap-x-8 gap-y-4 md:gap-y-0"
                    >
                        <div class="flex flex-col gap-1">
                            <label for="name" class="text-xs font-semibold"
                                >Full name</label
                            >
                            <input
                                type="text"
                                id="name"
                                v-model="form.name"
                                placeholder="Full name"
                                class="rounded border-slate-400"
                            />
                            <p class="text-xs text-red-500" v-if="errors.name">
                                {{ errors.name }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="ein" class="text-xs font-semibold"
                                >Employee Identification Number</label
                            >
                            <input
                                type="text"
                                id="ein"
                                v-model="form.ein"
                                placeholder="Employee Identification Number"
                                class="rounded border-slate-400"
                            />
                            <p class="text-xs text-red-500" v-if="errors.ein">
                                {{ errors.ein }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="grid md:grid-cols-2 grid-cols-1 md:gap-x-8 gap-y-4 md:gap-y-0"
                    >
                        <div class="flex flex-col gap-1">
                            <label for="position" class="text-xs font-semibold"
                                >Position</label
                            >
                            <select
                                id="position"
                                v-model="form.position"
                                class="rounded border-slate-400"
                            >
                                <option value="" selected disabled>
                                    Choose Position
                                </option>
                                <option value="Software Engineer">
                                    Software Engineer
                                </option>
                                <option value="Web Developer">
                                    Web Developer
                                </option>
                                <option value="BackEnd Developer">
                                    BackEnd Developer
                                </option>
                                <option value="FrontEnd Developer">
                                    FrontEnd Developer
                                </option>
                                <option value="Mobile Developer">
                                    Mobile Developer
                                </option>
                                <option value="Game Developer">
                                    Game Developer
                                </option>
                                <option value="DevOps Developer">
                                    DevOps Developer
                                </option>
                                <option value="System Analyst">
                                    System Analyst
                                </option>
                                <option value="Network Engineer">
                                    Network Engineer
                                </option>
                                <option value="Database Administrator">
                                    Database Administrator
                                </option>
                                <option value="Office Administration">
                                    Office Administration
                                </option>
                                <option value="Digital Marketing">
                                    Digital Marketing
                                </option>
                                <option value="Graphic Design">
                                    Graphic Design
                                </option>
                                <option value="UI UX Designer">
                                    UI UX Designer
                                </option>
                                <option value="IT Support">IT Support</option>
                            </select>
                            <p
                                class="text-xs text-red-500"
                                v-if="errors.position"
                            >
                                {{ errors.position }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="division" class="text-xs font-semibold"
                                >Division</label
                            >
                            <input
                                type="text"
                                id="division"
                                v-model="form.departmen_division"
                                placeholder="Division"
                                class="rounded border-slate-400"
                            />
                            <p
                                class="text-xs text-red-500"
                                v-if="errors.departmen_division"
                            >
                                {{ errors.departmen_division }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="grid md:grid-cols-2 grid-cols-1 md:gap-x-8 gap-y-4 md:gap-y-0"
                    >
                        <div class="flex flex-col gap-1">
                            <label for="date" class="text-xs font-semibold"
                                >Start Date</label
                            >
                            <input
                                type="date"
                                id="date"
                                v-model="form.start_date"
                                class="rounded border-slate-400"
                            />
                            <p
                                class="text-xs text-red-500"
                                v-if="errors.start_date"
                            >
                                {{ errors.start_date }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="status" class="text-xs font-semibold"
                                >Employment Status</label
                            >
                            <select
                                id="status"
                                v-model="form.employment_status"
                                class="rounded border-slate-400"
                            >
                                <option value="" selected disabled>
                                    Choose Status
                                </option>
                                <option value="Full Time">Full Time</option>
                                <option value="Contract">Contract</option>
                                <option value="Intership">Internship</option>
                            </select>
                            <p
                                class="text-xs text-red-500"
                                v-if="errors.employment_status"
                            >
                                {{ errors.employment_status }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="grid md:grid-cols-2 grid-cols-1 md:gap-x-8 gap-y-4 md:gap-y-0"
                    >
                        <div class="flex flex-col gap-1">
                            <label for="salary" class="text-xs font-semibold"
                                >Base Salary</label
                            >
                            <input
                                type="text"
                                id="salary"
                                v-model="form.base_salary"
                                class="rounded border-slate-400"
                                placeholder="Base Salary"
                            />
                            <p
                                class="text-xs text-red-500"
                                v-if="errors.base_salary"
                            >
                                {{ errors.base_salary }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="bank_acc" class="text-xs font-semibold"
                                >Bank Account</label
                            >
                            <input
                                type="text"
                                id="bank_acc"
                                v-model="form.bank_account"
                                class="rounded border-slate-400"
                                placeholder="Bank Account"
                            />
                            <p
                                class="text-xs text-red-500"
                                v-if="errors.bank_account"
                            >
                                {{ errors.bank_account }}
                            </p>
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="py-3 bg-orange-500 hover:bg-orange-600 text-white rounded mt-2"
                    >
                        Create new employee
                    </button>
                </form>
            </div>
        </section>
    </Frontend>
</template>

<script setup>
import Frontend from "@/Layouts/FrontendLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    errors: Object,
});

const form = useForm({
    name: "",
    ein: "",
    position: "",
    departmen_division: "",
    start_date: "",
    employment_status: "",
    base_salary: "",
    bank_account: "",
});

const saveEmployee = () => {
    const res = form.post(route("employees.store"));
    if (res) {
        form.reset();
    }
};
</script>
