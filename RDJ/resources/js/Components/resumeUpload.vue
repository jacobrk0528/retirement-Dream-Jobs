<template>
    <div class="bg-white rounded-xl">
        <div class="bg-teal-200 bg-opacity-60 p-6 rounded-xl border-2 border-black">
            <form>
                <div class="flex flex-col mb-3">
                    <label class="mb-2" for="inputFile">File:</label>
                    <input
                        type="file"
                        name="file"
                        id="inputFile"
                        class=""
                        @change="handleFileChange">
                </div>

                <div class="mb-3">
                    <PrimaryButton @click="uploadFile">Upload</PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import PrimaryButton from './PrimaryButton.vue'

    export default {
        data() {
            return {
                error: null,
                file: null
            }
        },
        components: {
            PrimaryButton
        },
        methods: {
            handleFileChange(event) {
                this.file = event.target.files[0];
                console.log(this.file);
            },
            uploadFile() {
                const formData = new FormData();
                formData.append('file', this.file);

                axios.post('/file-upload', formData)
                    .then(response => {
                        this.$emit('toggle-resume');
                    })
                    .catch(error => {
                        this.error = error.response.data.message;
                    });
            }
        }
    }
</script>
