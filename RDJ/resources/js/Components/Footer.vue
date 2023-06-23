<template>
    <div class="flex justify-end sm:justify-center items-center bg-teal-200 bg-opacity-70 h-24 w-screen">
        <Link
            :href="route('home')"
            class="mr-6 hover:text-gray-500"
            >Home
        </Link>

        <div v-if="Auth">
            <Link
                :href="route('dashboard')"
                class="mr-6 hover:text-gray-500"
                >Dashboard
            </Link>
            <Link
                :href="route('quiz')"
                class="mr-6 hover:text-gray-500"
                >Quiz
            </Link>
        </div>

        <Link
            :href="route('contact')"
            class="mr-6 sm:mr-0 hover:text-gray-500"
            >Contact
        </Link>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link
    },
    props: {
        Auth: {
        type: Boolean,
        required: true
        }
    }
}
</script>
