<template>
    <AppLayout :Auth="!!$page.props.auth.user">
        <QuizTable
            :user="$page.props.auth.user"
            :usersList="$page.props.users"
        />
    </AppLayout>
</template>

<script setup>
import AppLayout from '../Layouts/AppLayout.vue';
import QuizTable from './AdminPages/QuizTable.vue';

defineProps({
    user: Object,
    users: Array
});
</script>
