<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'block w-full pl-3 pr-4 py-2 border-l-4 border-sky-500 dark:border-sky-600 text-left text-base font-medium text-black dark:text-black bg-sky-200 dark:bg-indigo-900/50 focus:outline-none focus:text-indigo-800 dark:focus:text-indigo-200 focus:bg-sky-200 dark:focus:bg-sky-200 focus:border-sky-700 dark:focus:border-sky-300 transition duration-150 ease-in-out'
        : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-black dark:text-black hover:text-gray-800 dark:hover:text-gray-200 hover:bg-sky-200 dark:hover:bg-sky-300 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-black dark:focus:text-black focus:bg-sky-300 dark:sky:bg-sky-700 focus:border-sky-300 dark:focus:border-gray-600 transition duration-150 ease-in-out'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
