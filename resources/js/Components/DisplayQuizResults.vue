<template>
    <div class="flex flex-col items-center justify-center" style="height: calc(100vh - 12rem)">
      <div class="bg-white rounded-xl w-1/2 h-5/6 overflow-y-auto sm:w-full sm:px-4 md:w-full md:px-8">
        <div class="sticky top-0 bg-white rounded-t-xl shadow-md w-full py-4">
          <h4 class="flex justify-center">
            <button @click="goToAdmin()" class="absolute left-2 bottom-2 text-lg hover:text-blue-800">
                Back
            </button>
            <button @click="goToProfile()" class="text-2xl font-bold hover:text-blue-800">
                {{ user.name }}
            </button>
          </h4>
        </div>
        <template v-for="(answer, index) in questionAnswers" :key="index">
          <p class="my-2 font-semibold text-lg px-8 sm:px-2 md:px-5">{{ index }}?</p>
          <p class="ml-12 px-8 sm:px-2 sm:ml-6 ms:px-5 md:ml-8"> - {{ answer }}</p>
        </template>
      </div>
    </div>
  </template>

<script>
    export default {
        data() {
            return {
                questionAnswers: null
            }
        },
        props: {
            user: Object
        },
        created() {
            this.questionAnswers = JSON.parse(this.user.metas.quiz_results);
        },
        methods: {
            formatIndex(index) {
                return (index.replace(/\D/g, ""));
            },
            goToProfile() {
                window.location.href = `/userProfile/${this.user.id}`;
            },
            goToAdmin() {
                window.location.href = `/admin`;
            }
        },
    }
</script>