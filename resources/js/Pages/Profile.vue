<template>
    <AppLayout :Auth="!!$page.props.auth.user">
        <AccountSection
            :user="user"
            :visitingUser="visitingProfile"/>
        <DashboardSection
            :user="user"
            Label="Quiz"
            name="Placement"
            :visitingUser="visitingProfile"
        />
        <DashboardSection
            :user="user"
            Label="Resume"
            name="Resume"
            :visitingUser="visitingProfile"
        />
        <div v-if="successMessage" class="absolute right-0 bottom-24 sm:bottom-0 mr-4 mb-4">
            <SuccessMessage>
                {{ successMessage }}
            </SuccessMessage>
        </div>
    </AppLayout>
</template>


<script setup>
import AppLayout from '../Layouts/AppLayout.vue';
import AccountSection from '../Components/AccountSection.vue';
import DashboardSection from '../Components/DashboardSection.vue';
import SuccessMessage from '../Components/SuccessMessage.vue';

defineProps({
    user: Object,
    visitingProfile: Object,
    successMessage: String,
});
</script>

<style>
.img-container {
    max-height: 9rem;
}
</style>
