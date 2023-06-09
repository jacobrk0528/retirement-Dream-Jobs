<template>
    <AppLayout :Auth="!!user">
        <AccountSection :user="user"/>
        <DashboardSection
            Label="Quiz"
        />
    </AppLayout>
</template>


<script setup>
import AppLayout from '../Layouts/AppLayout.vue';
import AccountSection from '../Components/AccountSection.vue';
import DashboardSection from '../Components/DashboardSection.vue';

defineProps({
    user: Object
});
</script>

<style>
.img-container {
    max-height: 9rem;
}
</style>
