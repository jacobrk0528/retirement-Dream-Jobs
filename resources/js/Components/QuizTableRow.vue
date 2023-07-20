<template>
    <li>
        <div class="flex w-fit justify-between border-t-2 border-black">
            <!-- ID -->
            <div class="w-12 flex items-center justify-center">
                <div class="text-center cursor-pointer hover:text-blue-800" @click="goToProfile">{{ user.id }}</div>
            </div>
            <!-- NAME -->
            <div class="w-44 flex items-center justify-center">
                <div class="text-center cursor-pointer hover:text-blue-800" @click="goToProfile">{{ user.name }}</div>
            </div>
            <!-- Email -->
            <div class="w-64 flex items-center justify-center">
                <div class="text-center">{{ user.email }}</div>
            </div>
            <!-- RESPONSES -->
            <div class="w-64 text-center items-center flex justify-center" v-if="questionAnswers">
                <div v-if="showAnswers" class="flex-col w-full">
                    <template v-for="answer in questionAnswers">
                        <p class="my-2">{{ answer }}</p>
                    </template>

                    <div class="mt-2 w-2/3 mx-auto flex items-center justify-center cursor-pointer border-t-2 border-black border-dashed hover:text-blue-800" @click="showOrHideAnswers">
                        <p class="my-2 mr-1">Hide</p>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="w-4 h-4 inline-block align-middle transform rotate-180"
                        >
                            <path d="M6 9l6 6 6-6" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center cursor-pointer hover:text-blue-800" v-else @click="showOrHideAnswers">
                    <p class="my-2 mr-1">Show Responses</p>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="w-4 h-4 inline-block align-middle mx-auto"
                    >
                        <path d="M6 9l6 6 6-6" />
                    </svg>
                </div>
            </div>
        </div>
    </li>
</template>


<script>
export default {
    data() {
        return {
            questionAnswers: null,
            showAnswers: false
        };
    },
    props: {
        user: {
            type: Object,
            required: true
        }
    },
    created() {
        this.questionAnswers = JSON.parse(this.user.quiz_results);
    },
    methods: {
        showOrHideAnswers() {
            this.showAnswers = !this.showAnswers;
        },
        goToProfile() {
            window.location.href = `/userProfile/${this.user.id}`;
        }
    }

}
</script>
