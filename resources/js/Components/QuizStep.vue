<template>
    <div class="flex justify-center w-full height">
        <div class="w-1/2 my-auto sm:w-full sm:mx-4 bg-white rounded-xl">
        <!-- HEADER -->
        <div class="h-16 w-full bg-teal-200 opacity-70 flex justify-center items-center rounded-t-xl">
            <h1 class="text-3xl font-bold">Quiz</h1>
        </div>

        <!-- BODY -->
        <div class="flex flex-col items-center">
            <!-- Question -->
            <div class="ml-4 mt-12">
                <h5 class="text-xl font-semibold">
                    {{ question }}
                </h5>
            </div>

            <!-- Answers -->
            <div class="pt-4">
                <form class="flex flex-col">
                    <label v-for="option in optionsList">
                        <input
                            type="radio"
                            name="option"
                            :value=option
                            :checked = "questionAnswer == option.trim()"
                            @change = "updateAnswer(option)"
                        >
                        {{ option }}
                    </label>
                </form>
            </div>
        </div>

        <!-- NAVIGATION BUTTONS -->
        <div class="flex justify-between m-12 sm:m-4">
            <PrimaryButton @click="$emit('prev')">Previous</PrimaryButton>

            <p>{{ questionNumber }} of {{ maxQuestions }}</p>

            <PrimaryButton v-if="questionNumber == 0" @click="$emit('continue')">Next</PrimaryButton>
            <PrimaryButton v-else-if="questionNumber == maxQuestions" @click="$emit('submit')">Submit</PrimaryButton>
            <PrimaryButton v-else :disabled="isDisabled" @click="$emit('continue')">Next</PrimaryButton>
        </div>
        </div>
    </div>
</template>

<script>
import PrimaryButton from './PrimaryButton.vue';

export default {
    components: {
        PrimaryButton
    },
    data() {
        return {
            questionAnswer: this.getAnswer(),
            optionsList: this.options ? this.options.split(',') : ''
        }
    },
    props: {
        questionNumber: {
            type: Number,
            required: true
        },
        maxQuestions: {
            type: Number,
            required: true
        },
        question: {
            type: String,
            required: true
        },
        options: {
            type: String,
            required: true
        }
    },
    methods: {
        updateAnswer(answer) {
            axios.post('/update-quiz', {
                answer: answer,
                question: this.questionNumber
            })
            .then(response => {
                this.questionAnswer = answer;
            })
            .catch(error => {
                console.log(error);
            });
        },
        getAnswer() {
            axios.get('/get-quiz-answer', {
                params: {
                    question: this.questionNumber
                }
            })
            .then(response => {
                this.questionAnswer = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        }
    },
    computed: {
        isDisabled() {
            if (this.questionAnswer === '') {
                return true;
            } else {
                return false;
            }
        }
    }
}
</script>
