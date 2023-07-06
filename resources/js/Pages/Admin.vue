<template>
    <AppLayout :Auth="!!$page.props.auth.user">
        <div class="height flex flex-col justify-center">
            <QuizTable
                :user="$page.props.auth.user"
                :usersList="$page.props.users"
            />
        </div>
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

<style>
.height {
    height: calc(100vh - 12rem);
}
</style>
