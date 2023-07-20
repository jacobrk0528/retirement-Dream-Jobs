<script>

export default {
    props: {
        type: {
            type: String,
            default: 'button',
        },
        disabled: {
            type: Boolean,
            default: false,
        }
    },
}
</script>

<template>
    <button
        :type="type"
        class="inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase shadow-sm hover:bg-gray-50 disabled:opacity-25 transition ease-in-out duration-150"
        :disabled="this.disabled"
        >
        <slot />
    </button>
</template>
