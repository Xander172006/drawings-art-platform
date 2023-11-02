<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import { Head } from '@inertiajs/vue3';

// partials
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import ProfileForm from './Partials/Profile.vue';
import AccountForm from './Partials/Account.vue';
import MembershipForm from './Partials/Membership.vue';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const currentTabComponent = computed(() => {
    if (route().current('profile.edit', '/profile')) {
      return ProfileForm;
    } 
    else if (route().current('profile.edit', '/account')) {
      return AccountForm;
    }
    else if (route().current('profile.edit', '/memberships')) {
      return MembershipForm;
    }
  });

</script>

<template>
    <Head title="Profile" />
  
    <AuthenticatedLayout>
      <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6 h-full my-2">
          <div class="flex justify-center flex-col items-center">
            <h1 class="sm:mr-[55%] font-bold text-[2.25rem]">Settings</h1>
  
            <ul class="flex flex-row justify-evenly my-3 sm:gap-0 gap-2 font-semibold text-gray-600 sm:w-[85%] w-full sm:text-base text-[0.75rem]">
              <Link
                :href="route('profile.edit', '/profile')"
                :class="{ 'border-b-blue-400 border-b-[1.5px] text-blue-600  pb-2': route().current('profile.edit', '/profile') }"
              >
                Basic Concepts
              </Link>
              <Link
                :href="route('profile.edit', '/account')"
                :class="{ 'border-b-blue-400 border-b-[1.5px] text-blue-600  pb-2': route().current('profile.edit', '/account') }"
              >
                Account
              </Link>
              <Link
                :href="route('profile.edit', 'email-notifications')"
                :class="{ 'border-b-blue-400 border-b-[1.5px] text-blue-600  pb-2': route().current('profile.edit', 'email-notifications') }"
              >
                Email Notifications
              </Link>
              <Link
                :href="route('profile.edit', '/memberships')"
                :class="{ 'border-b-blue-400 border-b-[1.5px] text-blue-600  pb-2': route().current('profile.edit', '/memberships') }"
              >
                Memberships
              </Link>
            </ul>

  
            <div class="w-full">
              <component :is="currentTabComponent" />
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
</template>
