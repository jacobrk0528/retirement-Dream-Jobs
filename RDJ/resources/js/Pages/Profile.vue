<template>
    <AppLayout :Auth="!!$page.props.auth.user">
        <AccountSection
            :user="user"
            :visiting="visitingProfile"/>
        <DashboardSection
            Label="Quiz"
            name="Placement"
            :visiting="visitingProfile"
        />
        <DashboardSection
            Label="Resume"
            name="Resume"
            :visiting="visitingProfile"
        />
    </AppLayout>
</template>


<script setup>
import AppLayout from '../Layouts/AppLayout.vue';
import AccountSection from '../Components/AccountSection.vue';
import DashboardSection from '../Components/DashboardSection.vue';

defineProps({
    user: Object,
    visitingProfile: Boolean,
});
</script>

<style>
.img-container {
    max-height: 9rem;
}
</style>
