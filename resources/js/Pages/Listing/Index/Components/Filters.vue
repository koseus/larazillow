<template>
  <form @submit.prevent="filter">
    <div class="mb-8 mt-4 flex flex-wrap gap-2">
      <div class="flex flex-nowrap items-center">
        <input
          v-model="filterForm.priceFrom"
          type="text" placeholder="Price from"
          class="input-filter-l w-28"
        />
        <input
          v-model="filterForm.priceUpTo"
          type="text" placeholder="Price up to"
          class="input-filter-r w-28"
        />
      </div>

      <div class="flex flex-nowrap items-center">
        <select v-model="filterForm.numBedrooms" class="input-filter-l w-30">
          <option :value="null">Bedrooms</option>
          <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
          <option>6+</option>
        </select>

        <select v-model="filterForm.numBathrooms" class="input-filter-r w-30">
          <option :value="null">Bathrooms</option>
          <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
          <option>6+</option>
        </select>
      </div>

      <div class="flex flex-nowrap items-center">
        <input
          v-model="filterForm.areaFrom"
          type="text" placeholder="Area from"
          class="input-filter-l w-28"
        />
        <input
          v-model="filterForm.areaUpTo"
          type="text" placeholder="Area up to"
          class="input-filter-r w-28"
        />
      </div>

      <button type="submit" class="btn-normal">Filter</button>
      <button type="reset" class="btn-normal" @click="clear">Reset</button>
    </div>
  </form>
</template>

<script setup>
import {useForm} from '@inertiajs/inertia-vue3'

const props = defineProps({
  filters: Object,
})

const filterForm = useForm({
  priceFrom: props.filters.priceFrom ?? null,
  priceUpTo: props.filters.priceUpTo ?? null,
  numBedrooms: props.filters.numBedrooms ?? null,
  numBathrooms: props.filters.numBathrooms ?? null,
  areaFrom: props.filters.areaFrom ?? null,
  areaUpTo: props.filters.areaUpTo ?? null,
})

const filter = () => {
  filterForm.get(
    route('listing.index'),
    {
      preserveScroll: true,
      preserveState: true,
    },
  )
}

const clear = () => {
  filterForm.priceFrom = null
  filterForm.priceUpTo = null
  filterForm.numBedrooms = null
  filterForm.numBathrooms = null
  filterForm.areaFrom = null
  filterForm.areaUpTo = null
  filter()
}
</script>
