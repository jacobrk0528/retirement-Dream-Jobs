<template>
    <div class="ml-2 relative">
        <Dropdown align="right" width="48">
            <template #trigger>
                <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full transition">
                    <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                </button>

                <span v-else class="inline-flex rounded-md">
                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 transition ease-in-out duration-150">
                        {{ $page.props.auth.user.name }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </span>
            </template>

            <template #content>
                <!-- Authentication -->
                <DropdownLink
                    :href="route('admin')"
                    class="border-b border-gray-200"
                    v-if="$page.props.auth.user.role === 'admin'"
                >Admin</DropdownLink>
                <DropdownLink
                    :href="route('home')"
                    class="border-b border-gray-200"
                >Home</DropdownLink>
                <DropdownLink
                    :href="route('profile.show')"
                    class="border-b border-gray-200"
                >Profile
                </DropdownLink>
                <DropdownLink :href="route('quiz')"
                    class="border-b border-gray-200"
                >Quiz
                </DropdownLink>
                <form @submit.prevent="logout">
                    <DropdownLink as="button">
                        Log Out
                    </DropdownLink>
                </form>
            </template>
        </Dropdown>
    </div>
</template>

<script>
import { Link, router } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

export default {
    components: {
        Link,
        Dropdown,
        DropdownLink
    },
    methods: {
        logout() {
            router.post(route('logout'));
        }
    }
}
</script>
