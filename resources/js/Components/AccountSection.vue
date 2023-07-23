<template>
    <!-- Account Section -->
    <div class="flex justify-center mt-10 my-12 bg-white">
        <div class="w-10/12 my-2">
            <div class="flex sm:flex-col sm:justify-center sm:items-center">
                <!-- Profile IMG -->
                <div class="flex flex-col justify-center max-w-36">
                    <div class="h-auto w-auto img-container">
                        <img class="max-h-36 max-w-full" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name">
                    </div>
                </div>

                <!-- NAME; EMAIL; PHONE -->
                <div class="flex flex-col px-6 sm:px-0 sm:items-center">
                    <!-- NAME -->
                    <div>
                        <h4 class="text-2xl text-black">
                            {{ name }}
                        </h4>
                    </div>

                    <!-- Email -->
                    <div class="flex mt-auto sm:items-center">
                        <h6 class="mr-2">
                            Email:
                        </h6>
                        <p>
                            {{ email }}
                        </p>
                    </div>

                    <!-- PHONE -->
                    <div class="flex mt-1 sm:items-center">
                        <h6 class="mr-2">
                            Phone:
                        </h6>
                        <p>
                            {{ phone }}
                        </p>
                    </div>

                    <!-- DOB -->
                    <div class="flex mt-1 sm:items-center">
                        <h6 class="mr-2">
                            DOB:
                        </h6>
                        <p>
                            {{ dob }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex pt-6 sm:justify-center">
                <SecondaryButton
                    class="mr-4 w-36"
                    @click="redirectToProfile"
                    :disabled="visiting"
                >Edit Profile</SecondaryButton>
                <SecondaryButton
                    class="w-36"
                    @click="redirectToPassword"
                    :disabled="visiting"
                >Reset Password</SecondaryButton>
            </div>
        </div>
    </div>
</template>

<script>
    import SecondaryButton from "./SecondaryButton.vue";

    export default {
        data() {
            return {
                showEditProfile: false,
                name: this.user.name,
                email: this.user.email,
                phone: this.formatPhone(),
                dob: this.user && this.user.metas && this.user.metas.dob ? this.user.metas.dob : '',
            }
        },
        props: {
            className: {
                type: String,
                default: ''
            },
            user: {
                type: Object,
                required: true
            },
            visiting: {
                type: Boolean,
            }
        },
        components: {
            SecondaryButton
        },
        methods: {
            formatPhone() {
                if (this.user && this.user.metas && this.user.metas.phone) {
                    let phone = this.user.metas.phone;
                    return `(${phone.substring(0, 3)}) ${phone.substring(3, 6)}-${phone.substring(6)}`;
                }
                return '';
            },
            redirectToProfile() {
                window.location = '/user/profile';
            },
            redirectToPassword() {
                window.location = '/user/profile#Password';
            }
        },
    };
</script>


<style>
.img-container {
    max-height: 9rem;
}
</style>
