<template>
    <!-- Account Section -->
    <div class="bg-white p-4 pl-32 mt-10">
        <div class="flex">
            <!-- Profile IMG -->
            <div class="h-auto w-36 img-container">
                <img src="images/profileImage.png">
            </div>

            <!-- NAME; EMAIL; PHONE -->
            <div class="px-6 flex flex-col">
                <!-- NAME -->
                <div>
                    <h4 class="text-2xl text-black">
                        {{ name }}
                    </h4>
                </div>

                <!-- Email -->
                <div class="flex mt-auto">
                    <h6 class="mr-2">
                        Email:
                    </h6>
                    <p>
                        {{ email }}
                    </p>
                </div>

                <!-- PHONE -->
                <div class="flex mt-1">
                    <h6 class="mr-2">
                        Phone:
                    </h6>
                    <p>
                        {{ phone }}
                    </p>
                </div>

                <!-- DOB -->
                <div class="flex mt-1">
                    <h6 class="mr-2">
                        DOB:
                    </h6>
                    <p>
                        {{ dob }}
                    </p>
                </div>
            </div>
        </div>
        <div class="flex pt-6">
            <SecondaryButton class="mr-4 w-36" @click="redirectToProfile">Edit Profile</SecondaryButton>
            <SecondaryButton class="w-36" @click="redirectToPassword">Reset Password</SecondaryButton>
        </div>
    </div>

    <div class="flex justify-center items-center h-screen w-screen bg-gray-900 bg-opacity-40 absolute top-0 left-0 " v-if="showEditProfile">
        <div class="bg-white w-1/2 h-3/4 overflow-y-auto rounded-2xl">
            <EditProfile :showEditProfile="showEditProfile" :user="user" @close="showEditProfile = false"></EditProfile>
        </div>
    </div>

</template>

<script>
    import SecondaryButton from "./SecondaryButton.vue";
    import EditProfile from "./EditProfile.vue";

    export default {
        data() {
            return {
                showEditProfile: false,
                name: this.user.name,
                email: this.user.email,
                phone: this.formatPhone(),
                dob: this.user.dob
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
            }
        },
        components: {
            SecondaryButton,
            EditProfile
        },
        methods: {
            formatPhone() {
                console.log(this.user + " : " + this.user.dob)
                if (this.user && this.user.phone) {
                    let phone = this.user.phone;
                    return `(${phone.substring(0, 3)}) ${phone.substring(3, 6)}-${phone.substring(6)}`;
                }
                return '';
            },
            redirectToProfile() {
                window.location = route('profile.show');
            },
            redirectToPassword() {
                window.location = '/user/profile#Password';
            }
        }
    };
</script>


<style>
.img-container {
    max-height: 9rem;
}
</style>
