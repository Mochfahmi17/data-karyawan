<template>
    <div>
        <Navbar />
        <main class="bg-slate-100 h-full">
            <slot />
        </main>
    </div>
</template>

<script setup>
import Navbar from "@/Components/Navbar.vue";
</script>
