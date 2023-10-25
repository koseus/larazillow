<template>
  <Box>
    <template #header>Offer made</template>

    <Price :price="offer.amount" class="text-3xl" />

    <section class="mt-2 flex flex-col md:flex-row justify-between text-gray-500">
      <div>Made on</div>
      <div class="font-medium">{{ offerDate }}</div>
    </section>
  </Box>
</template>

<script setup>
import Price from '@/Components/Price.vue'
import Box from '@/Components/UI/Box.vue'
import { computed } from 'vue'

const props = defineProps({
  offer: Object,
})

const offerDate = computed(
  () => new Date(props.offer.created_at).toDateString(),
)

</script>
