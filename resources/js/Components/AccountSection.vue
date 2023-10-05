<template>
    <!-- DELETE SCREEN -->
    <div v-if="showDeleteScreen" class="absolute bg-gray-100 bg-opacity-60 w-screen" style="height: calc(100vh - 12rem);">
        <div class="flex w-full h-full items-center justify-center">
            <div class="bg-white flex w-full h-auto py-8 items-center justify-center text-center">
                <div>
                    <h1 class="text-xl font-bold">
                        Are you sure you want to delete {{ $page.props.user.name }}'s account?
                    </h1>

                    <div class="flex justify-evenly mt-12">
                        <PrimaryButton @click="toggleDeleteScreen">Cancel</PrimaryButton>
                        <DangerButton @click="deleteUser">Delete</DangerButton>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ELEVATE TO ADMIN SCREEN -->
    <div v-if="showElevateScreen" class="absolute bg-gray-100 bg-opacity-60 w-screen" style="height: calc(100vh - 12rem);">
        <div class="flex w-full h-full items-center justify-center">
            <div class="bg-white flex w-full h-auto py-8 items-center justify-center text-center">
                <div>
                    <h1 class="text-xl font-bold">
                        Are you sure you want to elevate {{ $page.props.user.name }}'s account to admin (This process is not reversable)?
                    </h1>

                    <div class="flex justify-evenly mt-12">
                        <PrimaryButton @click="toggleElevateScreen">Cancel</PrimaryButton>
                        <DangerButton @click="elevateUser">Elevate</DangerButton>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Account Section -->
    <div class="flex justify-center mt-10 my-12 bg-white">
        <div class="w-10/12 my-2">
            <div class="flex sm:flex-col sm:justify-center sm:items-center">
                <!-- Profile IMG -->
                <div class="flex flex-col justify-center max-w-36">
                    <div class="h-auto w-auto img-container">
                        <img v-if="getProfilePhotoType()" class="max-h-36 max-w-full" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name">
                        <img v-else class="h-36 w-full" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name">
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
                    class="w-36 mr-4"
                    @click="redirectToPassword"
                    :disabled="visiting"
                >Reset Password</SecondaryButton>
                <DangerButton 
                    @click="toggleElevateScreen"
                    v-if="user.role != 'admin' && visitingUser && visitingUser.role === 'admin'"
                    >Elevate To Admin
                </DangerButton>
                <DangerButton 
                    @click="toggleDeleteScreen"
                    v-if="visitingUser && visitingUser.role === 'admin'"
                    >Delete Account
                </DangerButton>
            </div>
        </div>
    </div>
</template>

<script>
    import SecondaryButton from "./SecondaryButton.vue";
    import DangerButton from "./DangerButton.vue";
    import PrimaryButton from "./PrimaryButton.vue";

    export default {
        data() {
            return {
                showEditProfile: false,
                name: this.user.name,
                email: this.user.email,
                phone: this.formatPhone(),
                dob: this.user && this.user.metas && this.user.metas.dob ? this.user.metas.dob : '',
                showDeleteScreen: false,
                showElevateScreen: false,
                visiting: !!this.visitingUser,
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
            visitingUser: {
                type: Object,
            }
        },
        components: {
    SecondaryButton,
    DangerButton,
    PrimaryButton
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
            },
            getProfilePhotoType() {
                if (this.user.profile_photo_url.includes('storage')) {
                    return true;
                } else {
                    return false;
                }
            },
            toggleDeleteScreen() {
                this.showDeleteScreen == true ? this.showDeleteScreen = false: this.showDeleteScreen = true;
            },
            toggleElevateScreen() {
                this.showElevateScreen == true ? this.showElevateScreen = false: this.showElevateScreen = true;
            },
            deleteUser() {
                axios.delete(`/deleteUser/${this.user.id}`)
                    .then(response => {
                        window.location.pathname = '/';
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            elevateUser() {
                axios.post(`/elevateUser/${this.user.id}`)
                    .then(response => {
                        this.toggleElevateScreen();
                        window.location.pathname = `/userProfile/${this.user.id}`;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
        }
    };
</script>


<style>
.img-container {
    max-height: 9rem;
}
</style>
