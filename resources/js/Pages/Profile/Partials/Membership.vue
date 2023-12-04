<script setup>
import { onMounted, ref } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';

const { user, profileImageUrl } = usePage().props;
const profile = ref(profileImageUrl);

const LiteMembership = ['hosted creator page', 'CodeArtistry communication tools', 'CodeArtistry Workshop'];
const ProMembership = ['Membership tiers', 'Analytics and insights', 'Special Offers promo tool', 'Creator-led workshops', 'Priority customer support'];
const PremiumMembership = ['Dedicated Partner Manager', 'Merch for Membership', 'Team Accounts'];

</script>

<script>
    export default {
    data() {
        return {
            membershipName: "yo",
        };
    },
    methods: {
        submitForm(membershipType) {
            this.selectedMembership = membershipType;

            this.$inertia.visit(`/membership/${this.selectedMembership}`);
        },
    },
    };
</script>

<template>
    <main class="flex flex-col justify-center items-center sm:w-full w-[95%] mx-auto h-full">
        <section class="px-8 pb-1 rounded-lg pt-6 mt-3 mb-10">
            <h1 class="font-bold text-[1.25rem] sm:text-[1.5rem] text-center sm:w-[70%] w-full mx-auto">Start a membership so that you can start creating awesome work</h1>
        </section>
  

        <div class="bg-sky-500 w-[31%] rounded-t-lg justify-center py-1 font-semibold text-white sm:flex hidden">
            <p>Recommended plan</p>
        </div>

        <section class="grid sm:grid-cols-3 gird-cols-1 place-content-evenly w-full text-center gap-8 h-full">

            <div class="bg-white w-full rounded-lg cursor-pointer">
                <div class="flex flex-col items-center border-b-[4px] border-b-gray-100 p-5">
                    <h2 class="font-bold text-[1.5rem]">Lite</h2>
                    <p class="text-[0.85rem] text-gray-500">Simple tools for recurring support from your fans.</p>
                    <br><br>
                </div>
                <div class="flex flex-col w-[90%] justify-center items-center mx-auto p-3 border-b-[1.5px] border-b-gray-300">
                    <p class="mr-auto text-sky-500 text-[1.75rem] font-black">5%</p>
                    <p class="text-[0.65rem] mr-auto text-gray-500">Of the monthly income you earn on CodeArtistry</p>
                </div>
                <div class="flex flex-row items-center justify-center gap-2 w-full mx-auto p-5 border-b-[2.5px] border-b-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-credit-card" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                    </svg>
                    <p class="text-gray-500 text-[0.8rem]">plus payment processing</p>
                </div>

                <form @submit.prevent="submitForm('Lite')" class="flex flex-col my-5 sm:h-[43%]">
                    <ul class="flex flex-col w-full px-4 py-2" v-for="(membership, index) in LiteMembership" :key="index">
                        <li class="mr-auto text-[0.85rem] flex flex-row items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#009E98" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                            <span>
                                {{ membership }}
                            </span>
                        </li>
                    </ul>
                    <div class="flex flex-col w-full mt-auto gap-3">
                        <button class="bg-sky-200 p-2 rounded-3xl w-[85%] mx-auto text-blue-700 hover:scale-[1.025] focus:bg-sky-300" type="submit">Get started</button>
                        <button>Learn more</button>
                    </div>
                </form>
            </div>
  

            <div class="bg-sky-500 w-full rounded-t-lg justify-center py-1 font-semibold text-white sm:hidden flex relative top-8">
                <p>Recommended plan</p>
            </div>
            <div class="bg-white w-full rounded-b-lg cursor-pointer border-[2px] border-sky-500">
                <div class="flex flex-col items-center border-b-[4px] border-b-gray-100 p-5">
                    <h2 class="font-bold text-[1.5rem]">Pro</h2>
                    <p class="text-[0.85rem] text-gray-500">Everything you need to make a thriving business or platform with a meaningful and rewarding experience for your biggest fans.</p>
                </div>
                <div class="flex flex-col w-[90%] justify-center items-center mx-auto p-3 border-b-[1.5px] border-b-gray-300">
                    <p class="mr-auto text-sky-500 text-[1.75rem] font-black">8%</p>
                    <p class="text-[0.65rem] mr-auto text-gray-500">Of the monthly income you earn on CodeArtistry</p>
                </div>
                <div class="flex flex-row items-center justify-center gap-2 w-full mx-auto p-5 border-b-[2.5px] border-b-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-credit-card" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                    </svg>
                    <p class="text-gray-500 text-[0.8rem]">plus payment processing</p>
                </div>

                <form @submit.prevent="submitForm('Pro')" class="flex flex-col my-5">
                    <ul class="flex flex-col w-full px-4 py-2" v-for="(membership, index) in ProMembership" :key="index">
                        <li class="mr-auto text-[0.85rem] flex flex-row items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#009E98" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                            <span>
                                {{ membership }}
                            </span>
                        </li>
                    </ul>
                    <div class="flex flex-col w-full mt-4 gap-3">
                        <button class="bg-sky-500 p-2 rounded-3xl w-[85%] mx-auto text-white hover:scale-[1.025] focus:bg-sky-600" type="submit">Get started</button>
                        <button>Learn more</button>
                    </div>
                </form>
            </div>
  
            <div class="bg-white w-full rounded-lg cursor-pointer">
                <div class="flex flex-col items-center border-b-[4px] border-b-gray-100 p-5">
                    <h2 class="font-bold text-[1.5rem]">Premium</h2>
                    <p class="text-[0.85rem] text-gray-500">Dedicated coaching and support for established creators and creative businesses, plus all premium features that save time.</p>
                </div>
                <div class="flex flex-col w-[90%] justify-center items-center mx-auto p-3 border-b-[1.5px] border-b-gray-300">
                    <p class="mr-auto text-sky-500 text-[1.75rem] font-black">12%</p>
                    <p class="text-[0.65rem] mr-auto text-gray-500">Of the monthly income you earn on CodeArtistry</p>
                </div>
                <div class="flex flex-row items-center justify-center gap-2 w-full mx-auto p-5 border-b-[2.5px] border-b-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-credit-card" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                    </svg>
                    <p class="text-gray-500 text-[0.8rem]">plus payment processing</p>
                </div>

                <form @submit.prevent="submitForm('Premium')" class="flex flex-col my-5 sm:h-[44.5%]">
                    <ul class="flex flex-col w-full px-4 py-2" v-for="(membership, index) in PremiumMembership" :key="index">
                        <li class="mr-auto text-[0.85rem] flex flex-row items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#009E98" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                            <span>
                                {{ membership }}
                            </span>
                        </li>
                    </ul>
                    <div class="flex flex-col w-full gap-3 mt-auto">
                        <button class="bg-sky-200 p-2 rounded-3xl w-[85%] mx-auto text-blue-700 hover:scale-[1.025] focus:bg-sky-300" type="submit">Get started</button>
                        <button>Learn more</button>
                    </div>
                </form>
            </div>
      </section>
    </main>
</template>  