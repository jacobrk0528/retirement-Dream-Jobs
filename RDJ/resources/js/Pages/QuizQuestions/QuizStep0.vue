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
                    <h5 class="text-xl font-semibold" v-if="isCompleted">
                        Would you like to take the quiz?
                    </h5>
                    <h5 class="text-xl font-semibold" v-else>
                        Would you like to update your quiz?
                    </h5>
                </div>
            </div>

            <!-- NAVIGATION BUTTONS -->
            <div class="flex justify-between m-12">
                <PrimaryButton @click="$emit('prev')">Previous</PrimaryButton>
                <PrimaryButton @click="$emit('continue')">Begin</PrimaryButton>
            </div>
        </div>
    </div>
</template>

<script>
import PrimaryButton from '../../Components/PrimaryButton.vue';

export default {
    data() {
        return {
            isCompleted: this.getIsCompleted()
        }
    },
    components: {
        PrimaryButton
    },
    methods: {
        getIsCompleted() {
            axios.get('/quiz-completed')
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    mounted() {

    }
}
</script>
