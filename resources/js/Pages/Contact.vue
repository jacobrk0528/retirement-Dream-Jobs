<template>
    <AppLayout :Auth="!!user">
      <form  @submit.prevent>
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
      </form>

        <div v-if="success" class="fixed bottom-25 right-0 m-4 bg-teal-300 text-black p-4 rounded">
            {{ successMessage }}
        </div>
    </AppLayout>
  </template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
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

const success = ref(false);
const successMessage = ref('Your message has been sent!');

const submitForm = () => {
  axios.post('/send-email', form)
    .then(response => {
        success.value = true;
        form.name = '';
        form.email = '';
        form.message = '';
        setTimeout(() => {
            success.value = false;
        }, 3000);
    })
    .catch(error => {
        console.error(error);
        if (error.response) {
            console.log(error.response.data);
            console.log(error.response.status);
            console.log(error.response.headers);
        } else if (error.request) {
            console.log(error.request);
        } else {
            console.log('Error', error.message);
        }
    });
};


</script>

<style>
.form-width {
    width: 100vh;
}
</style>
