<template>
    <AppLayout :Auth="!!$page.props.auth.user">
        <AccountSection :user="user" :visiting="visiting"/>
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
    user: Object,
    visiting: Boolean,
});
</script>

<style>
.img-container {
    max-height: 9rem;
}
</style>
