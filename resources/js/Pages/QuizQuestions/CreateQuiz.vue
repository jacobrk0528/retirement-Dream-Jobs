<template>
    <div v-if="step == 0">
        <QuizStep
            :questionNumber = step
            :maxQuestions = maxSteps
            options = ""
            @cancel="cancel"
            @continue="nextStep"
        ></QuizStep>
    </div>
    <div v-if="step == 1">
        <QuizStep
            :questionNumber = step
            :maxQuestions = maxSteps
            options = "Morning, Afternoon, Evening"
            @cancel="cancel"
            @continue="nextStep"
        ></QuizStep>
    </div>
    <div v-if="step == 2">
        <QuizStep
            :questionNumber = step
            :maxQuestions = maxSteps
            options = "Collaboratively in a team, Independently, Both in team and individual settings, It doesn't matter to me"
            @prev="prevStep"
            @continue="nextStep"
        ></QuizStep>
    </div>
    <div v-if="step == 3">
        <QuizStep
            :questionNumber = step
            :maxQuestions = maxSteps
            options = "Indoors, Outdoors, Both indoor and outdoor settings, I have no preference"
            @prev="prevStep"
            @continue="nextStep"
        ></QuizStep>
    </div>
    <div v-if="step == 4">
        <QuizStep
            :questionNumber = step
            :maxQuestions = maxSteps
            options = "Analyze and strategize solutions, Seek guidance and advice from others, Embrace challenges and learn from experience, I prefer to avoid high-pressure situations"
            @prev="prevStep"
            @continue="nextStep"
        ></QuizStep>
    </div>
    <div v-if="step == 5">
        <QuizStep
            :questionNumber = step
            :maxQuestions = maxSteps
            options = "Opportunities for creativity and innovation, Financial rewards and stability, Making a positive impact on others or the community, Personal growth and continuous learning"
            @prev="prevStep"
            @continue="nextStep"
        ></QuizStep>
    </div>
    <div v-if="step == 6">
        <QuizStep
            :questionNumber = step
            :maxQuestions = maxSteps
            options = "Art and Creativity, Technology and Innovation, Helping and Caring for Others, Outdoor Activities and Nature, Business and Entrepreneurship"
            @prev="prevStep"
            @continue="nextStep"
        ></QuizStep>
    </div>
    <div v-if="step == 7">
        <QuizStep
            :questionNumber = step
            :maxQuestions = maxSteps
            options = "Extremely important; it's a top priority, Moderately important; I value it but can be flexible, Not a priority; work takes precedence"
            @prev="prevStep"
            @continue="nextStep"
        ></QuizStep>
    </div>
    <div v-if="step == 8">
        <QuizStep
            :questionNumber = step
            :maxQuestions = maxSteps
            options = "Yes; I'm eager to learn and adapt, Maybe; if it's necessary for the job I'm interested in, No; I prefer a job that requires minimal training"
            @prev="prevStep"
            @continue="nextStep"
        ></QuizStep>
    </div>
    <div v-if="step == 9">
        <QuizStep
            :questionNumber = step
            :maxQuestions = maxSteps
            options = "Full-time; regular office hours, Part-time; flexible schedule, Project-based or freelance work, I am open to any working hours"
            @prev="prevStep"
            @continue="nextStep"
        ></QuizStep>
    </div>
    <div v-if="step == 10">
        <QuizStep
            :questionNumber = step
            :maxQuestions = maxSteps
            options = "Very important; I thrive in social settings, Moderately important; a balance of social and solitary time, Not important; I prefer working alone"
            @prev="prevStep"
            @continue="nextStep"
            @submit="submit"
        ></QuizStep>
    </div>
</template>

<script>
    import QuizStep from '../../Components/QuizStep.vue'
    import QuizSubmit from './QuizSubmit.vue';

    export default {
        data() {
            return {
                step: 0,
                maxSteps: 10,
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
                        window.location.pathname = '/profile/success';
                    })
                    .catch(error => {
                        console.log(error);
                        console.log(error.response.data);
                    });
            }
        },
    };
</script>

