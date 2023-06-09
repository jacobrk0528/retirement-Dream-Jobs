<template>
    <div class="flex justify-center my-12">
        <div class="label">
            <h3 class="text-2xl uppercase">{{ Label }}</h3>
            <!-- LABELS SECTION -->
            <div class="flex bg-teal-200 bg-opacity-70  justify-evenly items-center h-10">
                <div class="w-3/12 text-center">
                    Name
                </div>
                <div class="w-3/12 text-center">
                    Status
                </div>
                <div class="w-3/12 text-center">
                    Completion Date
                </div>
                <div class="w-3/12 text-center">
                    Action
                </div>
            </div>
            <!-- DATA SECTION -->
            <div class="flex bg-white justify-evenly items-center h-10">
                <div class="w-3/12 text-center">
                    Placement
                </div>
                <div class="w-3/12 text-center">
                    Incomplete
                </div>
                <div class="w-3/12 text-center">
                    12/24/24
                </div>
                <div class="flex w-3/12 justify-center">
                    <SecondaryButton class="w-5/12 button">Take</SecondaryButton>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SecondaryButton from './SecondaryButton.vue';

export default {
    components: {
    SecondaryButton
},
    props: {
        Label: {
        type: String,
        required: true
        }
    },
}
</script>

<style>
.label {
    width: calc(100% - 20%);
}
</style>
