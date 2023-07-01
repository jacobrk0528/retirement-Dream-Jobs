<template>
    <AppLayout :Auth="!!user">
        <CreateQuiz
        :user = "user"
        :results = "results"
        />
    </AppLayout>
</template>

<script setup>
  import AppLayout from '../Layouts/AppLayout.vue';
  import CreateQuiz from '../Pages/QuizQuestions/CreateQuiz.vue';


  defineProps({
    user: Object,
    results: Object
    });
</script>

<style>
.height {
    height: calc(100vh - 12rem);
}
</style>
