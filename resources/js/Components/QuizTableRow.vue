<template>
    <li>
        <div class="flex w-fit justify-between border-t-2 border-black h-12">
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
            <div class="w-64 items-center flex justify-center mr-2">
                <button @click="showAnswers" class="hover:text-blue-800">
                    View Responses
                </button>
            </div>
        </div>
    </li>
</template>


<script>
export default {
    data() {
        return {
            questionAnswers: null,
            answerNumber: 1,
        };
    },
    props: {
        user: {
            type: Object,
            required: true
        }
    },
    created() {
        this.questionAnswers = JSON.parse(this.user.metas.quiz_results);
    },
    methods: {
        showAnswers() {
            window.location.href = `/show-Quiz-Results/${this.user.id}`;
        },
        goToProfile() {
            window.location.href = `/userProfile/${this.user.id}`;
        },
        formatIndex(index) {
            return (index.replace(/\D/g, ""));
        }
    }

}
</script>
