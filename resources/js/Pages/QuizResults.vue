<template>
    <AppLayout :Auth="!!$page.props.auth.user">
        <DisplayQuizResults :user="user"/>
    </AppLayout>
</template>

<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import DisplayQuizResults from '@/Components/DisplayQuizResults.vue'

    defineProps({
        user: Object,
    });

</script>