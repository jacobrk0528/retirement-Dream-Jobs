<template>
    <div v-if="show" class="bg-teal-300 p-2 rounded-xl">
        <slot/>
    </div>
</template>

<script>
export default {
    data() {
        return {
            show: false
        }
    },
    methods: {
        flashMessage() {
            this.show = true;
            setTimeout(() => {
                this.show = false; // Hide the message after 3 seconds
            }, 3000);
        }
    },
    mounted() {
        this.flashMessage();
    }
}
</script>
