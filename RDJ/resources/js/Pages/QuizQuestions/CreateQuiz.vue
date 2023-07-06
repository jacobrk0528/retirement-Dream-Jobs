<template>
    <div v-if="step == 0">
        <QuizStep
            questionNumber = 0
            question = "Would you like to begin the quiz?"
            @cancel="cancel"
            @continue="nextStep"
        ></QuizStep>
    </div>
    <div v-if="step == 1">
        <QuizStep
            questionNumber = 1
            question = "First Question?"
            options = "option 1, option 2, option 3"
            @prev="prevStep"
            @continue="nextStep"
        ></QuizStep>
    </div>
    <div v-if="step == 2">
        <QuizStep
            questionNumber = 2
            question = "Second Question?"
            options = "option 1, option 2, option 3"
            @prev="prevStep"
            @continue="nextStep"
        ></QuizStep>
    </div>
    <div v-if="step == 3">
        <QuizStep
            questionNumber = 3
            question = "Third Question?"
            options = "option 1, option 2, option 3"
            @prev="prevStep"
            @continue="nextStep"
        ></QuizStep>
    </div>
    <div v-if="step == 4">
        <QuizStep
            questionNumber = 4
            question = "Fourth Question?"
            options = "option 1, option 2, option 3"
            @prev="prevStep"
            @continue="nextStep"
        ></QuizStep>
    </div>
    <div v-if="step == 5">
        <QuizStep
            questionNumber = 5
            question = "Fifth Question?"
            options = "option 1, option 2, option 3"
            @prev="prevStep"
            @continue="nextStep"
        ></QuizStep>
    </div>
    <div v-if="step == maxSteps">
        <QuizSubmit
        @prev="prevStep"
        @submit="submit"
        ></QuizSubmit>
    </div>
</template>

<script>
    import QuizStep from '../../Components/QuizStep.vue'
    import QuizSubmit from './QuizSubmit.vue';

    export default {
        data() {
            return {
                step: 0,
                maxSteps: 6,
            }
        },
        props: {
            user: Object,
            results: Object
        },
        components: {
    QuizStep,
    QuizSubmit
},
        methods: {
            nextStep() {
                if (this.step < this.maxSteps) {
                    this.step++;
                }
            },
            prevStep() {
                if (this.step > 0) {
                    this.step--;
                }
            },
            cancel() {
                window.location.pathname = '/profile';
            },
            submit() {
                axios.post('/submit-quiz')
                    .then(response => {
                        window.location.pathname = '/profile';
                    })
                    .catch(error => {
                        console.log(error);
                        console.log(error.response.data);
                    });
            }
        },
        mounted() {
            axios.post('/setup-quiz')
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                });
        }

    };
</script>

