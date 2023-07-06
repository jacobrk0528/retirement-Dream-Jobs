<template>
    <div class="absolute flex bg-teal-200 bg-opacity-70 h-24 w-screen">
        <!-- LOGO -->
        <a href="/" class="flex justify-center items-center mx-6 md:ml-4 sm:ml-2 sm:w-1/3">
            <img src="/images/Logo.PNG" alt="img" class="object-cover h-auto max-h-24">
        </a>

        <!-- TITLE -->
        <a href="/" class="mx-auto self-center text-center lg:text-6xl md:text-4xl sm:text-2xl">
            <h1>Retirement Dream Jobs</h1>
        </a>

        <!-- HAMBURGER -->
        <div v-if="Auth" class="mx-6 sm:mr-2 self-center">
            <Hamburger />
        </div>
        <div v-else class="ml-auto mr-6 sm:mr-2 self-center">
            <LoginRegister/>
        </div>
    </div>
</template>

<script>
import Logo from './Logo.vue';
import LoginRegister from './LoginRegister.vue';
import Hamburger from './Hamburger.vue';

export default {
    components: {
    Logo,
    LoginRegister,
    Hamburger,
},
    props: {
        Auth: {
        type: Boolean,
        required: true
        }
    }
}
</script>
