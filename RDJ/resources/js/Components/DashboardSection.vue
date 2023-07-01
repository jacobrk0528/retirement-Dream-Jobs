<template>
    <div class="flex justify-center my-12">
        <div class="w-10/12">
            <h3 class="text-2xl uppercase sm:text-center">{{ Label }}</h3>
            <div class="sm:flex">
                <!-- LABELS SECTION -->
                <div class="flex sm:block bg-teal-200 bg-opacity-70 justify-evenly items-center h-10 sm:h-auto sm:w-1/2">
                    <div class="w-3/12 sm:w-full text-center">
                        Name
                    </div>
                    <div class="w-3/12 sm:w-full text-center">
                        Status
                    </div>
                    <div class="w-3/12 sm:w-full text-center">
                        Completion Date
                    </div>
                    <div class="w-3/12 sm:w-full text-center">
                        Action
                    </div>
                </div>
                <!-- DATA SECTION -->
                <div class="flex bg-white justify-evenly items-center h-10 sm:block sm:h-auto sm:w-1/2">
                    <div class="w-3/12 sm:w-full text-center">
                        Placement
                    </div>
                    <div class="w-3/12 sm:w-full text-center">
                        {{ completedLabel }}
                    </div>
                    <div class="w-3/12 sm:w-full text-center">
                        12/24/24
                    </div>
                    <div class="flex w-3/12 sm:w-full sm:pt-1 justify-center">
                        <SecondaryButton @click="takeQuiz" class="w-5/12 sm:h-4 button">{{ buttonLabel }}</SecondaryButton>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import SecondaryButton from './SecondaryButton.vue';

export default {
    data() {
        return {
            buttonLabel: '',
            completedLabel: '',
        }
    },
    components: {
        SecondaryButton
    },
    props: {
        Label: {
            type: String,
            required: true
        }
    },
    async created() {
        this.buttonLabel = await this.quizLabel(1);
        this.completedLabel = await this.quizLabel(2);
    },
    methods: {
        takeQuiz() {
            window.location.href = '/quiz';
        },
        async quizLabel(num) {
            try {
                const response = await axios.get('/quiz-completed');
                if (response.data == true) {
                    if (num == 1) {
                        return 'Update';
                    } else {
                        return 'Completed';
                    }
                } else {
                    if (num == 1) {
                        return 'Take';
                    } else {
                        return 'Incomplete';
                    }
                }
            } catch (error) {
                console.log(error);
            }
        }
    }
}
</script>

<style>
</style>
