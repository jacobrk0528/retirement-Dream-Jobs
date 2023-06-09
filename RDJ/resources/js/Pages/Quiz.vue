<template>
    <AppLayout :Auth="!!user">
        s
    </AppLayout>
</template>

<script setup>
  import AppLayout from '../Layouts/AppLayout.vue';


  defineProps({
    user: Object
    });
</script>
