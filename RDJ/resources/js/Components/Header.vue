<template>
    <div class="absolute flex bg-teal-200 bg-opacity-70 h-24 w-screen">
        <Logo class="mr-auto ml-6"></Logo>
        <a href="/" class="mx-auto self-center text-6xl">
            <h1>Retirement Dream Jobs</h1>
        </a>

        <div v-if="Auth" class="ml-auto mr-6 self-center">
            <Hamburger />
        </div>
        <div v-else class="ml-auto mr-6 self-center">
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

