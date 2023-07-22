<template>
    <div class="flex flex-col min-h-screen bg-gray-100">
      <Header :Auth="Auth" />

      <div class="mt-24 height flex-grow">
          <slot />
      </div>

      <Footer :Auth="Auth" />
    </div>
</template>


<script>
import Header from '../Components/Header.vue';
import Footer from "../Components/Footer.vue";

export default {
    components: {
        Header,
        Footer
    },
    props: {
        Auth: {
            type: Boolean,
            required: true
        }
    },
}
</script>

<style>
.height {
    min-height: calc(100vh - 12rem);
}
</style>
