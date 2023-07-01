<template>
    <div v-if="step == 0">
        <QuizStep0
        @cancel="cancel"
        @continue="nextStep"
    ></QuizStep0>
    </div>
    <div v-if="step == 1">
        <QuizStep1
        @prev="prevStep"
        @continue="nextStep"
    ></QuizStep1>
    </div>
    <div v-if="step == 2">
        <QuizStep2
        @continue="nextStep"
        @prev="prevStep"
    ></QuizStep2>
    </div>
    <div v-if="step == 3">
        <QuizStep3
        @continue="nextStep"
        @prev="prevStep"
        ></QuizStep3>
    </div>
    <div v-if="step == 4">
        <QuizStep4
        @continue="nextStep"
        @prev="prevStep"
        ></QuizStep4>
    </div>
    <div v-if="step == 5">
        <QuizStep5
        @continue="nextStep"
        @prev="prevStep"
        ></QuizStep5>
    </div>
    <div v-if="step == maxSteps">
        <QuizSubmit
            @prev="prevStep"
        ></QuizSubmit>
    </div>
</template>

<script>
    import QuizStep0 from './QuizStep0.vue';
    import QuizStep1 from './QuizStep1.vue';
    import QuizStep2 from './QuizStep2.vue';
    import QuizStep3 from './QuizStep3.vue';
    import QuizStep4 from './QuizStep4.vue';
    import QuizStep5 from './QuizStep5.vue';
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
            QuizStep0,
            QuizStep1,
            QuizStep2,
            QuizStep3,
            QuizStep4,
            QuizStep5,
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
                window.location.pathname = '/dashboard';
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

