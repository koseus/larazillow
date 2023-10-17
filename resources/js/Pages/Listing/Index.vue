<template>
  <div v-for="listing in listings" :key="listing.id">
    <Link :href="`/listing/${listing.id}`">
      <ListingAddress :listing="listing" />
    </Link>
  </div>
</template>

<script setup>
// eslint-disable-next-line no-unused-vars
import {Link} from '@inertiajs/inertia-vue3'
import ListingAddress from '@/Components/ListingAddress.vue'
defineProps({
  listings: Array,
})
</script>
