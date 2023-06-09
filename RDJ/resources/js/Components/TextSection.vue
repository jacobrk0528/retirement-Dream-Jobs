<template>
    <div class="ml-12 w-5/12 mb-12 mr-12">
        <h1 class="text-3xl ml-10 px-2 border-b border-black w-fit">{{ title }}</h1>
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
