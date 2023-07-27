<template>
    <AppLayout :Auth="!!$page.props.auth.user">
        <!-- IMAGE -->
        <div class="h-auto">
            <img src="/images/Main2.png" alt="Main Logo" class="img1">
        </div>

        <!-- OUR MISSION -->
        <TextSection title="Our Mission" class="pt-6">
            At Retirement Dream Jobs, our mission is to help you find your perfect post-retirement career path. 
            We believe that retirement opens doors to exciting opportunities, and our platform offers a personalized quiz designed to uncover your unique skills, 
            interests, and preferences. After taking the quiz, our dedicated team of administrators will carefully review your results and provide 
            tailored recommendations for the best-suited jobs available. Let us guide you towards a fulfilling and rewarding post-retirement journey, 
            making your dreams a reality. Embrace a new chapter with Retirement Dream Jobs today!
        </TextSection>

        <!-- HOW WE WORK -->
        <TextSection title="How We Work" class="ml-auto">
            At Retirement Dream Jobs, our process is simple and effective. First, sign up and take our comprehensive quiz that uncovers 
            your strengths and aspirations. Next, our expert team of administrators meticulously analyzes your quiz results. Finally, 
            we provide you with personalized job recommendations based on what aligns best with your skills and interests. With our streamlined approach, 
            finding your ideal retirement dream job has never been easier. Start your journey towards post-retirement fulfillment today!
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
