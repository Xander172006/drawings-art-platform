<script setup>
import { onMounted, ref } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';

// onchange profile picture
onMounted(() => {
    let inputFile = document.getElementById('fileInput');
    let profilePicture = document.getElementById('profile-picture');

    if (inputFile) {
        inputFile.onchange = function () {
            document.getElementById('no-profile').style.display = 'none';
            profilePicture.src = URL.createObjectURL(inputFile.files[0]);
            profilePicture.style.display = 'block';
        };
    }
});

const { user, profileImageUrl } = usePage().props;
const profile = ref(profileImageUrl);

// set values in the form
const form = useForm({
    name: user.name,
    email: user.email,
    region: user.region,
    profile_image: user.profile_image
});


function hideFlashMessage() {
    document.getElementById('flashMessage').style.display = 'none';
}

</script>

<template>
    <section class="bg-white px-8 pt-6 pb-1 rounded-lg">
       <h1 class="font-bold text-[1.25rem]">Profile information</h1>

        <form @submit.prevent="form.post(route('profile.update'))" class="my-[5%] flex flex-col gap-7" enctype="multipart/form-data">
            <div class="flex flex-col items-start">
                <strong>Profile</strong>
                <label class="custom-file-label flex flex-row items-center gap-3 my-2">
                    <img v-if="user.profile_image" :src="profile" alt="profile_picture" class="w-[10%] rounded-[50%]">
                    <svg v-else xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-person-circle" id="no-profile" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>

                    <img src="" alt="profile-picture" id="profile-picture" class="w-[9%] hidden rounded-[50%]">
                    <span class="cursor-pointer py-2 px-4 bg-gray-200 rounded-xl text-[0.9rem] font-semibold hover:bg-gray-300">upload picture</span>
                    <input 
                        type="file"
                        id="fileInput"
                        name="profile_image"
                        class="hidden"
                        v-on:change="form.profile_image = $event.target.files[0]"
                    >
                </label>
            </div>

            <div v-if="$page.props.flash.message" class="absolute right-[5%] bottom-[5%] bg-white p-5 rounded-lg shadow-md w-[17.5%]" id="flashMessage">
                <span class="flex flex-row items-center gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#33FF32" class="bi bi-check2 font-bold" viewBox="0 0 16 16">
                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" stroke="green" stroke-width="2"/>
                    </svg>

                    {{ $page.props.flash.message }}

                    <button class="ml-auto hover:bg-gray-300 p-2 rounded-md" v-on:click="hideFlashMessage">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                        </svg>
                    </button>
                </span>
            </div>

            <div>
                <ul class="flex flex-col gap-[1.5rem]">
                    <li class="flex flex-col gap-1">
                        <label for="" class="font-semibold">Username</label>
                        <input type="text" name="name" v-model="form.name" class="rounded-lg border-gray-400 focus:ring-0 focus:border-black focus:outline-none">
                        <div class="text-red-500 text-[0.9rem] my-1" v-if="form.errors.name">{{ form.errors.name }}</div>
                    </li>


                    <li class="flex flex-col gap-1">
                        <label for="" class="font-semibold">Email</label>
                        <input type="text" name="email" v-model="form.email" class="rounded-lg border-gray-400 focus:ring-0 focus:border-black focus:outline-none">
                        <div class="text-red-500 text-[0.9rem] my-1" v-if="form.errors.email">{{ form.errors.email }}</div>
                    </li>


                    <li class="flex flex-col gap-1">
                        <label for="" class="font-semibold">Region</label>
                        <select name="region" v-model="form.region" class="rounded-lg border-gray-400 focus:ring-0 focus:border-black focus:outline-none">
                            <option value="North-America">North-America</option>
                            <option value="South-America">South America</option>
                            <option value="Europe">Europe</option>
                            <option value="Oceania">Oceania</option>
                            <option value="Asia">Asia</option>
                            <option value="Africa">Africa</option>
                        </select>
                        <div class="text-red-500 text-[0.9rem] my-1" v-if="form.errors.region">{{ form.errors.region }}</div>
                    </li>

                </ul>
            </div>
            <button class="bg-gray-600 text-white w-[22.5%] mt-auto p-2 rounded-lg focus:bg-gray-700" :disabled="form.processing">Save</button>
        </form>
    </section>
</template>