<script setup>

import { Head, Link } from '@inertiajs/vue3';
import { useForm, usePage } from '@inertiajs/vue3';

const { membershipName } = usePage().props;

</script>

<template>
    <main class="w-full flex justify-center gap-5 flex-row text-center">
        <section class="flex flex-col w-full bg-white h-[100vh]">
            <div class="my-10">
                <h1 class="font-bold text-[1.5rem] my-4">Purchasing Details</h1>
                <div class="w-[30%] text-left mx-auto">
                    <p class="text-gray-500 text-[0.9rem]">
                        Since this app does not use Stripe for purchasing
                        online features you can continue by pressing the sign up button.
                    </p>
                </div>
            </div>
            <form action="" class="flex justify-center">
                <button class="bg-sky-500 flex flex-row p-2 rounded-xl w-[20%] justify-center items-center gap-2 text-white hover:scale-105 focus:text-gray-700 transition duration-300 ease-in-out">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z"/>
                        </svg>
                    </span>

                    <span>Buy now</span>
                </button>
            </form>
        </section>

        <section class="flex flex-col w-full h-[100vh]">
            <div class="my-10 mx-12 text-left">
                <p class="font-bold text-[1.25rem] my-5">{{ membershipName }} membership</p>
                <p class="mr-auto">total costs</p>
                <p class="mr-auto">User:</p>
            </div>
        </section>
    </main>
</template>
