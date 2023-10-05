<template>
    <div v-if="isOpen" class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50">
      <div class="w-1/2 h-3/4 bg-white rounded-lg shadow-md p-8">
        <!-- Content of the popup -->
        <slot></slot>
      </div>
    </div>
</template>

<script>
export default {
data() {
    return {
    isOpen: false,
    };
},
methods: {
    openPopup() {
    this.isOpen = true;
    },
    closePopup(event) {
    // Close the popup only if clicked outside of the popup box
    if (event.target.classList.contains("fixed")) {
        this.isOpen = false;
    }
    },
},
};
</script>