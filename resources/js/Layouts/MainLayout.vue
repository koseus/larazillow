<template>
    <Link href="/">Main Page</Link>
    <Link href="/hello">Display Page</Link>
    <slot>Default</slot>
</template>

<script setup>
    import {Link} from '@inertiajs/inertia-vue3'
</script>
