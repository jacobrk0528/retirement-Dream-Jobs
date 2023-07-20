<template>
    <div v-if="showResumeUpload" class="fixed top-0 left-0 w-full h-full bg-gray-300 bg-opacity-70">
        <div class="flex items-center justify-center h-full">
            <resumeUpload @toggle-resume="toggleResume" />
        </div>
    </div>

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
                        {{ name }}
                    </div>
                    <div class="w-3/12 sm:w-full text-center">
                        {{ statusLabel }}
                    </div>
                    <div class="w-3/12 sm:w-full text-center">
                        {{ completionDate  }}
                    </div>
                    <div class="flex w-3/12 sm:w-full sm:pt-1 justify-center">
                        <SecondaryButton
                            v-if="Label == 'Quiz'"
                            @click="takeQuiz"
                            class="w-5/12 sm:h-4 button"
                            :disabled="visiting"
                        >{{ buttonLabel }}</SecondaryButton>
                        <div v-if="Label == 'Resume'" class="flex justify-center w-5/12">
                            <SecondaryButton
                            v-if="!visiting"
                            @click="toggleResume"
                            class=" sm:h-4 button"
                            >Upload</SecondaryButton>

                            <SecondaryButton
                            v-else
                            class="sm:h-4 button"
                            :disabled="!hasResume"
                            @click="downloadResume"
                            >Download</SecondaryButton>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import SecondaryButton from './SecondaryButton.vue';
import PrimaryButton from './PrimaryButton.vue'
import resumeUpload from '../Components/resumeUpload.vue';

export default {
    data() {
        return {
            buttonLabel: '',
            statusLabel: '',
            completionDate: '',
            showResumeUpload: false,
            hasResume: false,
        }
    },
    components: {
        SecondaryButton,
        PrimaryButton,
        resumeUpload
    },
    props: {
        user: {
            type: Object,
            required: true
        },
        Label: {
            type: String,
            required: true
        },
        name: {
            type: String,
            required: true
        },
        visiting: {
            type: Boolean,
        }
    },
    async created() {
        this.buttonLabel = await this.quizLabel(1);
        this.statusLabel = this.Label == "Resume" ? await this.resumeLabel() : await this.quizLabel(2);
    },
    methods: {
        takeQuiz() {
            window.location.href = '/quiz';
        },
        toggleResume() {
            this.showResumeUpload = !this.showResumeUpload
        },
        async quizLabel(num) {
            try {
                const response = await axios.get('/quiz-completed');
                if (response.data.completed == true) {
                    this.completionDate = response.data.completed_at;
                    if (num == 1) {
                        return 'Update';
                    } else {
                        return 'Completed';
                    }
                } else {
                    this.completionDate = '-';
                    if (num == 1) {
                        return 'Take';
                    } else {
                        return 'Incomplete';
                    }
                }
            } catch (error) {
                console.log(error);
            }
        },
        async resumeLabel() {
            try {
                const response = await axios.get(`/file-uploaded/${this.user.id}`);
                if (response.data.uploaded == true) {
                    this.completionDate = response.data.uploaded_at;
                    this.hasResume = true;
                    return 'Uploaded';
                } else {
                    this.completionDate = '-';
                    return 'Incomplete';
                }
            } catch (error) {
                console.log(error);
            }
        },
        downloadResume() {
            const userId = this.user.id;
            axios.get(`file-download/${userId}`, {responseType: 'blob'})
                .then(response => {
                    const url = window.URL.createObjectURL(response.data);
                    const link = document.createElement('a');
                    const filename = `${this.user.name}_resume.pdf`;

                    link.href = url;
                    link.setAttribute('download', filename);
                    document.body.appendChild(link);
                    link.click();
                    link.remove();
                })
                .catch(error => {
                    console.log(error)
                });
        }
    }
}
</script>

<style>
</style>
