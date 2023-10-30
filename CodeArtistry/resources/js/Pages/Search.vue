<script setup>
import { ref, onMounted } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';

const searchValue = ref('');
const users = usePage().props.users;
const maxUsersToDisplay = 5;

onMounted(() => {
    const searchInput = document.getElementById('Searchinput');
    const listItems = document.querySelectorAll('ul[data-lists] li[data-list]');

    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const value = e.target.value.toLowerCase();

            listItems.forEach((li, index) => {
                if (value.trim() === '') {
                    li.style.display = 'none';
                } else {
                    const user = users.find(u => li.id === 'searchResult' + u.id);
                    if (user) {
                        const isVisible =
                            user.name.toLowerCase().includes(value) ||
                            user.email.toLowerCase().includes(value);
                        li.style.display = isVisible && index < maxUsersToDisplay ? 'flex' : 'none';
                    }
                }
            });
        });
    }
});
</script>

<template>
    <Head title="Search" />

    <AuthenticatedLayout>
        <div class="py-12 w-full bg-SearchBg bg-cover h-[100vh]">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-[15%] mb-[3%] flex flex-col justify-center items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-search font-extrabold" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                    <p class="text-[2rem] font-bold">Search for creators you like</p>

                    <form action="" class="w-full flex justify-center my-4">
                        <span class="absolute w-[35%] flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search font-extrabold absolute left-4" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                            <input 
                                type="search" 
                                class="w-full bg-white bg-opacity-30 border-[2px] border-white rounded-3xl pl-12 hover:scale-[1.025] focus:border-sky-400 hover:border-sky-400 focus:ring-0 focus:outline-none transition-all duration-300 ease-in-out" 
                                id="Searchinput"
                                v-model="searchValue"
                            >
                        </span>
                    </form>
                </div>

                <div class="flex justify-center items-center">
                    <ul class="w-[40%] bg-white flex flex-col justify-center items-center rounded-lg" data-lists>
                        <li
                            class="w-full hidden text-[0.85rem] flex-row items-center hover:bg-gray-200 hover:rounded-lg gap-4 p-2"
                            :id="'searchResult' + user.id"
                            v-for="(user, index) in users"
                            :key="user.id"
                            data-list
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>

                            <div class="flex flex-col">
                                <span>{{ user.name }}</span>
                                <span class="text-gray-500">{{ user.email }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
