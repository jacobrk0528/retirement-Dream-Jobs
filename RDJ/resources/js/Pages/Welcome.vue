<template>
    <AppLayout :Auth="isAuth">
        <div class="h-auto">
            <img src="/images/Main2.png" alt="Main Logo" class="img1">
        </div>
        <TextSection title="Our Mission" class="pt-6">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec turpis non lacus cursus commodo. Fusce volutpat dapibus mauris,
            at interdum justo elementum vel. Praesent nec nulla at elit bibendum suscipit ac vel enim. Phasellus in ipsum id orci laoreet
            interdum nec et tortor. Sed consectetur neque sit amet urna consequat, eu sodales magna iaculis.
        </TextSection>
        <TextSection title="How We Work" class="ml-auto">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec turpis non lacus cursus commodo. Fusce volutpat dapibus mauris,
            at interdum justo elementum vel. Praesent nec nulla at elit bibendum suscipit ac vel enim. Phasellus in ipsum id orci laoreet
            interdum nec et tortor. Sed consectetur neque sit amet urna consequat, eu sodales magna iaculis.
        </TextSection>
    </AppLayout>
</template>


<script setup>
import TextSection from "../Components/TextSection.vue";
import AppLayout from '../Layouts/AppLayout.vue';

defineProps({
    isAuth: Boolean
});

</script>
<style>
.img1 {
    height: auto;
    width: auto;
    max-width: 100%;
}
</style>
