<template>
    <AppLayout :Auth="!!user">
      <form @submit.prevent="submitForm">
        <div class="flex justify-center items-center my-20">
            <!-- content -->
            <div class="form-width">
                <!-- TITLE -->
                <div class="flex flex-col justify-center items-center h-16 bg-teal-200 bg-opacity-70">
                    <h3 class="text-2xl">Contact Us</h3>
                </div>
                <!-- FORM -->
                <div class="bg-white p-8">
                    <!-- NAME -->
                    <div class="py-2">
                        <h6>Name:</h6>
                        <input
                            type="text"
                            class="w-full h-10 p-2 bg-gray-200"
                            v-model="form.name"
                        >
                    </div>
                    <!-- NAME -->
                    <div class="py-2">
                        <h6>Email:</h6>
                        <input
                            type="email"
                            class="w-full h-10 p-2 bg-gray-200"
                            v-model="form.email"
                        >
                    </div>
                    <!-- NAME -->
                    <div class="py-2">
                        <h6>Message:</h6>
                        <textarea
                            class="w-full h-40 p-2 bg-gray-200"
                            maxlength="450"
                            v-model="form.message"
                        ></textarea>
                    </div>

                    <div class="flex justify-center items-center">
                        <PrimaryButton class="mt-4" @click="submitForm">Submit</PrimaryButton>
                    </div>
                </div>
            </div>
        </div>









        <!-- <input type="text" v-model="form.name" placeholder="Name">
        <input type="email" v-model="form.email" placeholder="Email">

        <button type="submit">Submit</button> -->
      </form>
    </AppLayout>
  </template>

<script setup>
  import AppLayout from '../Layouts/AppLayout.vue';
  import PrimaryButton from '../Components/PrimaryButton.vue';


  defineProps({
    user: Object
    });

  const form = {
    name: '',
    email: '',
    message: '',
  };

  const submitForm = () => {
    // Handle form submission
  };
</script>

<style>
.form-width {
    width: 100vh;
}
</style>

