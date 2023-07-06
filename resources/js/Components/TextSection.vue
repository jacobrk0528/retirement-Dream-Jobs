<template>
    <div class="m-12 mt-0 w-5/12 md2:mx-0 md2:w-full md2:px-4">
        <h1 class="text-3xl ml-10 px-2 mb-2 border-b border-black w-fit">{{ title }}</h1>
        <slot class="text-xl "/>
    </div>
</template>

<script>
export default {
    props: {
    title: String,
  }
}

</script>
