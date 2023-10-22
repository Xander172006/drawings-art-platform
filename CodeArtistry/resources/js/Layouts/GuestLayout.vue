<script setup>
    import ApplicationLogo from '@/Components/ApplicationLogo.vue';
    import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
         style="background-image: url('https://m.media-amazon.com/images/M/MV5BMjA1OTNlZmItMTkzOC00ZTFkLTlhNWYtZjNkMzY2ZDkyNTNhXkEyXkFqcGdeQXVyOTc4OTAwMjU@._V1_.jpg'); background-size: cover;">
        <div>
            <Link href="/">
                <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
