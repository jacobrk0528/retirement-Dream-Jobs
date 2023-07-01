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
                        Would you like to {{ label }} the quiz?
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
            label: ''
        }
    },
    components: {
        PrimaryButton
    },
    async created() {
        this.label = await this.getLabel();
    },
    methods: {
        async getLabel() {
            try {
                const response = await axios.get('/quiz-completed');
                if (response.data == true) {
                    return 'update';
                } else {
                    return 'take';
                }
            } catch (error) {
                console.log(error);
            }
        }
    },
    mounted() {

    }
}
</script>
