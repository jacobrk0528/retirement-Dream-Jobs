<template>
    <div>
        <div class="flex flex-col bg-teal-200 bg-opacity-70 w-full rounded-t-2xl border-b border-black">
            <h3 class="text-2xl my-4 self-center">Edit Profile</h3>
        </div>
        <!-- Email/Phone -->
        <div class="flex justify-center items-center">
            <div class="flex mt-6 pb-4 w-90p justify-center items-center border-b border-black">
                <!-- Email -->
                <div class="flex flex-col items-center w-full">
                    <label class="text-lg">Email</label>
                    <TextInput class="w-full h-12" v-model="formData.email"/>
                </div>
                <!-- Phone -->
                <div class="flex flex-col ml-8 items-center w-full">
                    <label class="text-lg">Phone</label>
                    <TextInput class="w-full h-12" v-model="formData.phone"/>
                </div>
            </div>
        </div>

        <!-- Name -->
        <div class="mt-6 flex flex-col justify-center items-center">
            <label class="text-lg">Name</label>

            <div class="flex pb-4 w-90p justify-center items-center border-b border-black">
                <!-- First -->
                <div class="flex flex-col items-center w-full">
                    <label class="self-start">First</label>
                    <TextInput class="w-full h-12" v-model="formData.firstName"/>
                </div>
                <!-- Middle -->
                <div class="flex flex-col ml-8 items-center w-full">
                    <label class="self-start">Middle</label>
                    <TextInput class="w-full h-12" v-model="formData.middleName"/>
                </div>
                <!-- Last -->
                <div class="flex flex-col ml-8 items-center w-full">
                    <label class="self-start">Last</label>
                    <TextInput class="w-full h-12" v-model="formData.lastName"/>
                </div>
            </div>
        </div>

        <!-- DOB -->
        <div class="mt-6 flex flex-col justify-center items-center">
            <label class="text-lg">Date Of Birth</label>

            <div class="flex pb-4 w-90p justify-center items-center border-b border-black">
                <!-- First -->
                <div class="flex flex-col items-center w-full">
                    <label class="self-start">Month</label>
                    <TextInput class="w-full h-12" v-model="formData.dob.month"/>
                </div>
                <!-- Middle -->
                <div class="flex flex-col ml-8 items-center w-full">
                    <label class="self-start">Day</label>
                    <TextInput class="w-full h-12" v-model="formData.dob.day"/>
                </div>
                <!-- Last -->
                <div class="flex flex-col ml-8 items-center w-full">
                    <label class="self-start">Year</label>
                    <TextInput class="w-full h-12" v-model="formData.dob.year"/>
                </div>
            </div>
        </div>

        <!-- ADDRESS -->
        <div class="mt-6 flex flex-col justify-center items-center">
            <label class="text-lg">Address</label>

            <div class="flex flex-col pb-4 w-90p justify-center items-center border-b border-black">
                <div class="flex w-full">
                    <!-- Street 1 -->
                    <div class="flex flex-col items-center w-full">
                        <label class="self-start">Street 1</label>
                        <TextInput class="w-full h-12" v-model="formData.address.street1"/>
                    </div>
                    <!-- Street 2 -->
                    <div class="flex flex-col ml-8 items-center w-full">
                        <label class="self-start">Street 2</label>
                        <TextInput class="w-full h-12" v-model="formData.address.street2"/>
                    </div>
                </div>
                <div class="flex w-full">
                    <!-- City -->
                    <div class="flex flex-col items-center w-full">
                        <label class="self-start">City</label>
                        <TextInput class="w-full h-12" v-model="formData.address.city"/>
                    </div>
                    <!-- State -->
                    <div class="flex flex-col ml-8 items-center w-full">
                        <label class="self-start">State</label>
                        <TextInput class="w-full h-12" v-model="formData.address.state"/>
                    </div>
                    <!-- Zip -->
                    <div class="flex flex-col ml-8 items-center w-full">
                        <label class="self-start">Zip</label>
                        <TextInput class="w-full h-12" v-model="formData.address.zip"/>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cancle/Submit -->
        <div class="flex justify-center my-8">
            <SecondaryButton class="mr-8 w-36 h-10" @click="handleClose">Cancel</SecondaryButton>
            <!-- <SecondaryButton class="w-36 h-10" @submit="submit">Submit</SecondaryButton> -->
            <SecondaryButton class="w-36 h-10" @click="submit">Submit</SecondaryButton>
        </div>
    </div>
</template>


<script>
import axios from 'axios';
import SecondaryButton from './SecondaryButton.vue';
import TextInput from './TextInput.vue';

let hasErrors = false;

    export default {
        components: {
            SecondaryButton,
            TextInput
        },
        props: {
            user: {
                type: Object,
                required: true
            },
            showEditProfile: {
                type: Boolean
            }
        },
        data() {
            return {
                formData: {
                    email: this.user.email,
                    phone: this.user.phone,
                    firstName: this.user.firstName,
                    middleName: this.user.middleName,
                    lastName: this.user.lastName,
                    address: this.getAddress(),
                    dob: this.getdob()
                }
            };
        },
        methods: {
            handleClose() {
                this.$emit('close');
            },
            submit(event) {
                event.preventDefault();

                const formData = new FormData();

                formData.append('email', this.formData.email);
                formData.append('phone', this.formData.phone);
                formData.append('firstName', this.formData.firstName);
                formData.append('middleName', this.formData.middleName);
                formData.append('lastName', this.formData.lastName);
                formData.append('dob', JSON.stringify(this.formData.dob));
                formData.append('address', JSON.stringify(this.formData.address));

                axios.post('/updateUser', formData)
                    .then(response => {
                        console.log(response.data);
                        window.location.href = '/dashboard';
                    })
                    .catch(error => {
                        console.error(error.data);
                    });
            },
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
                return { day: '', month: '', year: '' };
            },
        }
    }
</script>

<style>
.w-40p {
    width: 40%;
}
.w-90p {
    width: 90%;
}
</style>
