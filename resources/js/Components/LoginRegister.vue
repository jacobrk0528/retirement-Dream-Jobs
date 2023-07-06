<template>
    <a>
        <Link v-if="$page.props.auth.user" :href="route('profile.show')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Profile</Link>
        <template v-else>
                <Link
                    :href="route('login')"
                    class="hover:text-gray-500"
                    >Log in</Link>

                /

                <Link
                    :href="route('register')"
                    class="hover:text-gray-500"
                    >Register</Link>
        </template>
    </a>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link
    }
}
</script>
