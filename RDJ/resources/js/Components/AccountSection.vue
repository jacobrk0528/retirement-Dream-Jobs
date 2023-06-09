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
                    <h6 class="mr-2 mb-6">
                        Email:
                    </h6>
                    <p>
                        {{ email }}
                    </p>
                </div>

                <!-- PHONE -->
                <div class="flex">
                    <h6 class="mr-2">
                        Phone:
                    </h6>
                    <p>
                        {{ phone }}
                    </p>
                </div>
            </div>
            <!-- ADDRESS; DOB -->
            <div class="flex flex-col">
                <!-- Address -->
                <div class="flex mt-auto">
                    <h6 class="mr-2">
                        Address:
                    </h6>
                    <div>
                        <p>
                            {{ address.street1 }}
                        </p>
                        <p v-if="address.city">
                            {{ capitalizeFirstLetter(address.city) }}, {{ address.state.toUpperCase() }} {{ address.zip }}
                        </p>
                    </div>
                </div>
                <!-- DOB -->
                <div class="flex">
                    <h6 class="mr-2">
                        DOB:
                    </h6>
                    <p v-if="dob.month">
                        {{ dob.month }} / {{ dob.day }} / {{ dob.year }}
                    </p>
                </div>
            </div>
        </div>
        <div class="flex pt-6">
            <SecondaryButton class="mr-4 w-36" @click="showEditProfile = true">Edit Profile</SecondaryButton>
            <SecondaryButton class="w-36">Reset Password</SecondaryButton>
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
                address: this.getAddress(),
                dob: this.getdob()
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
            getAddress() {
                if (this.user && this.user.address) {
                    return JSON.parse(this.user.address);
                }
                return {};
            },
            getdob() {
                if (this.user && this.user.dob) {
                    return JSON.parse(this.user.dob);
                }
                return {};
            },
            formatPhone() {
                if (this.user && this.user.phone) {
                    let phone = this.user.phone;
                    return `(${phone.substring(0, 3)}) ${phone.substring(3, 6)}-${phone.substring(6)}`;
                }
                return '';
            },
            capitalizeFirstLetter(string) {
                if (!string) return '';
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
        }
    };
</script>


<style>
.img-container {
    max-height: 9rem;
}
</style>
