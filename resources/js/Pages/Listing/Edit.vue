<template>
  <form @submit.prevent="update">
    <div class="grid grid-cols-6 gap-4">
      <div class="col-span-2">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Bedrooms</label>
        <input
          v-model.number="form.bedrooms" type="text" class="block w-full p-2 rounded-md shadow-sm
        border border-gray-300 dark:border-gray-600 text-gray-500"
        />
        <div v-if="form.errors.bedrooms">
          {{ form.errors.bedrooms }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Bathrooms</label>
        <input
          v-model.number="form.bathrooms" type="text" class="block w-full p-2 rounded-md shadow-sm
        border border-gray-300 dark:border-gray-600 text-gray-500"
        />
        <div v-if="form.errors.bathrooms">
          {{ form.errors.bathrooms }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Area</label>
        <input
          v-model.number="form.area" type="text" class="block w-full p-2 rounded-md shadow-sm
        border border-gray-300 dark:border-gray-600 text-gray-500"
        />
        <div v-if="form.errors.area">
          {{ form.errors.area }}
        </div>
      </div>

      <div class="col-span-4">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">City</label>
        <input
          v-model="form.city" type="text" class="block w-full p-2 rounded-md shadow-sm
        border border-gray-300 dark:border-gray-600 text-gray-500"
        />
        <div v-if="form.errors.city">
          {{ form.errors.city }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">ZipCode</label>
        <input
          v-model="form.zipcode" type="text" class="block w-full p-2 rounded-md shadow-sm
        border border-gray-300 dark:border-gray-600 text-gray-500"
        />
        <div v-if="form.errors.zipcode">
          {{ form.errors.zipcode }}
        </div>
      </div>

      <div class="col-span-4">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Street</label>
        <input
          v-model="form.street" type="text" class="block w-full p-2 rounded-md shadow-sm
        border border-gray-300 dark:border-gray-600 text-gray-500"
        />
        <div v-if="form.errors.street">
          {{ form.errors.street }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Street Number</label>
        <input
          v-model="form.street_num" type="text" class="block w-full p-2 rounded-md shadow-sm
        border border-gray-300 dark:border-gray-600 text-gray-500"
        />
        <div v-if="form.errors.street_num">
          {{ form.errors.street_num }}
        </div>
      </div>

      <div class="col-span-6">
        <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Price</label>
        <input
          v-model.number="form.price" type="text" class="block w-full p-2 rounded-md shadow-sm
        border border-gray-300 dark:border-gray-600 text-gray-500"
        />
        <div v-if="form.errors.price">
          {{ form.errors.price }}
        </div>
      </div>

      <div>
        <button type="submit">Edit</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
  listing: Object,
})
const form = useForm({
  bedrooms: props.listing.bedrooms,
  bathrooms: props.listing.bathrooms,
  area: props.listing.area,
  city: props.listing.city,
  street: props.listing.street,
  zipcode: props.listing.zipcode,
  street_num: props.listing.street_num,
  price: props.listing.price,
})
const update = () => form.put(route('listing.update', {listing: props.listing.id}))
</script>

<style scoped>
label {
margin-right: 2em;
}

div {
padding: 2px
}
</style>
