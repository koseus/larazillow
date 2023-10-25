<template>
  <Box>
    <template #header>
      Make an offer
    </template>
    <div>
      <form @submit.prevent="makeOffer">
        <input v-model.number="form.amount" type="text" class="input" />
        <input
          v-model.number="form.amount"
          type="range" :min="minimum" :max="maximum" step="10000"
          class="w-full h-4 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer"
        />
        <button type="submit" class="btn-outline w-full mt-2 text-sm">Make an offer</button>

        {{ form.errors.amount }}
      </form>
    </div>
    <div class="flex justify-between text-gray-500 mt-2">
      <div>
        Difference
      </div>
      <div>
        <Price :price="difference" />
      </div>
    </div>
  </Box>
</template>

<script setup>
import Price from '@/Components/Price.vue'
import Box from '@/Components/UI/Box.vue'
import { useForm } from '@inertiajs/inertia-vue3'
import { computed } from 'vue'

const props = defineProps({
  listingId: Number,
  price: Number,
})

const form = useForm({
  amount: props.price,
})

const makeOffer = () => form.post(
  route('listing.offer.store', {listing: props.listingId}),
  {
    preserveScroll: true,
    preserveState: true,
  },
)

const difference = computed(() =>form.amount - props.price )
const minimum = computed(() => props.price / 2)
const maximum = computed(() => props.price * 2)
</script>
