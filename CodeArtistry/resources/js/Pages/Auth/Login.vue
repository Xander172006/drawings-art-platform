<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <p class="mt-6 mb-10 text-[1.75rem] font-semibold flex justify-center">Login</p>

        <form @submit.prevent="submit" class="w-[75%] mx-auto">
            <div>
                <span class="flex items-center border-b-[2px] border-b-gray-500 hover:border-b-[2.5px] hover:pb-2 transition-all duration-300 ease-in-out focus:ring-0 focus:border-b-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                    </svg>
                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="email"
                    />
                </span>

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-8">
                <span class="flex items-center border-b-[2px] border-b-gray-500 hover:border-b-[2.5px] hover:pb-2 transition-all duration-300 ease-in-out focus:ring-0 focus:border-b-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="16" viewBox="0 0 50 50">
                        <path d="M 25 3 C 18.363281 3 13 8.363281 13 15 L 13 20 L 9 20 C 7.300781 20 6 21.300781 6 23 L 6 47 C 6 48.699219 7.300781 50 9 50 L 41 50 C 42.699219 50 44 48.699219 44 47 L 44 23 C 44 21.300781 42.699219 20 41 20 L 37 20 L 37 15 C 37 8.363281 31.636719 3 25 3 Z M 25 5 C 30.566406 5 35 9.433594 35 15 L 35 20 L 15 20 L 15 15 C 15 9.433594 19.433594 5 25 5 Z M 25 30 C 26.699219 30 28 31.300781 28 33 C 28 33.898438 27.601563 34.6875 27 35.1875 L 27 38 C 27 39.101563 26.101563 40 25 40 C 23.898438 40 23 39.101563 23 38 L 23 35.1875 C 22.398438 34.6875 22 33.898438 22 33 C 22 31.300781 23.300781 30 25 30 Z"></path>
                    </svg>
                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                        placeholder="password"
                    />
                </span>

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex flex-row w-full justify-between mt-4 mb-6">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-[0.75rem] sm:text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                </label>
                <label>
                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="underline text-[0.75rem] sm:text-sm text-sky-700"
                    >
                        Forgot your password?
                    </Link>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4 w-full">
                <PrimaryButton  :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
        <span class="flex justify-center gap-2 my-3">Don't have an account? <Link class="text-sky-500" :href="route('register')">Signup</Link></span>
    </GuestLayout>
</template>
