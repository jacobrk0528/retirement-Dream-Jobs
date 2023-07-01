<template>
    <div class="flex justify-center w-full height">
        <div class="w-1/2 my-auto bg-white rounded-xl">
        <!-- HEADER -->
        <div class="h-16 w-full bg-teal-200 opacity-70 flex justify-center items-center rounded-t-xl">
            <h1 class="text-3xl font-bold">Quiz</h1>
        </div>

        <!-- BODY -->
        <div class="flex flex-col items-center">
            <!-- Question -->
            <div class="ml-4 mt-12">
                <h5 class="text-xl font-semibold">
                    First Question
                </h5>
            </div>

            <!-- Answers -->
            <div class="pt-4">
                <form>
                    <label>
                        <input
                            type="radio"
                            name="option"
                            :value= option1
                            :checked = "question1Answer === option1"
                            @change = "updateAnswer(option1)"
                        >
                        Option 1
                    </label>
                    <br>
                    <label>
                        <input
                            type="radio"
                            name="option"
                            :value= option2
                            :checked = "question1Answer === option2"
                            @change = "updateAnswer(option2)"
                        >
                        Option 2
                    </label>
                    <br>
                    <label>
                        <input
                            type="radio"
                            name="option"
                            :value= option3
                            :checked = "question1Answer === option3"
                            @change = "updateAnswer(option3)"
                        >
                        Option 3
                    </label>
                </form>
            </div>
        </div>

        <!-- NAVIGATION BUTTONS -->
        <div class="flex justify-between m-12">
            <PrimaryButton @click="$emit('prev')">Previous</PrimaryButton>
            <PrimaryButton @click="$emit('continue')">Next</PrimaryButton>
        </div>
        </div>
    </div>
</template>

<script>
import PrimaryButton from '../../Components/PrimaryButton.vue';

export default {
    components: {
        PrimaryButton
    },
    data() {
        return {
            option1: 'option 1',
            option2: 'option 2',
            option3: 'option 3',
            question1Answer: this.getAnswer()
        }
    },
    methods: {
        updateAnswer(answer) {
            axios.post('/update-quiz', {
                answer: answer,
                question: 1
            })
            .then(response => {
                console.log(response);
            })
            .catch(error => {
                console.log(error);
            });
        },
        getAnswer() {
            axios.get('/get-quiz-answer', {
                params: {
                    question: 1
                }
            })
            .then(response => {
                console.log(response);
                this.question1Answer = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        }
    }
}
</script>
