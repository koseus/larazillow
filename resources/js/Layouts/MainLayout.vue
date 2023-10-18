<template>
  <Link href="/">Main Page </Link>
  <Link href="/hello">Display Page</Link>
  <!-- <div>The page with time {{ timer }}</div> -->

  <div v-if="page.props.value.flash.success" class="success">
    {{ page.props.value.flash.success }}
  </div>
  <slot>Default</slot>
</template>

<script setup>
import {Link, usePage} from '@inertiajs/inertia-vue3'

// page.props.value.flash.success
const page = usePage()
// import {ref} from 'vue'

// const timer = ref(0)
// setInterval(() => timer.value++, 1000)
</script>

<style scoped>
.success{
    background-color: green;
    color: white;
}
</style>
