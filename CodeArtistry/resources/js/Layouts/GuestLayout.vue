<script setup>
    import ApplicationLogo from '@/Components/ApplicationLogo.vue';
    import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center bg-gradient-to-r from-slate-200 to-sky-500">
        <h1 class="font-lobster text-[2.5rem] font-bold mb-6 mt-6 sm:mt-0">CodeArtistry</h1>
        <div class="w-[95%] sm:max-w-lg mt-6 px-4 py-6 bg-white bg-opacity-30 backdrop-blur-[4px] shadow-2xl overflow-hidden sm:rounded-lg">
            <div class="flex flex-col justify-center items-center">
                <Link href="/">
                </Link>
            </div>
            <slot />
        </div>
    </div>
</template>
