<template>
  <form @submit.prevent="create">
    <div class="grid grid-cols-6 gap-4">
      <div class="col-span-2">
        <label class="label">Bedrooms</label>
        <input v-model.number="form.bedrooms" type="text" class="input" />
        <div v-if="form.errors.bedrooms" class="input-error">
          {{ form.errors.bedrooms }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="label">Bathrooms</label>
        <input v-model.number="form.bathrooms" type="text" class="input" />
        <div v-if="form.errors.bathrooms" class="input-error">
          {{ form.errors.bathrooms }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="label">Area</label>
        <input v-model.number="form.area" type="text" class="input" />
        <div v-if="form.errors.area" class="input-error">
          {{ form.errors.area }}
        </div>
      </div>

      <div class="col-span-4">
        <label class="label">City</label>
        <input v-model="form.city" type="text" class="input" />
        <div v-if="form.errors.city" class="input-error">
          {{ form.errors.city }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="label">Zipcode</label>
        <input v-model="form.zipcode" type="text" class="input" />
        <div v-if="form.errors.zipcode" class="input-error">
          {{ form.errors.zipcode }}
        </div>
      </div>

      <div class="col-span-4">
        <label class="label">Street</label>
        <input v-model="form.street" type="text" class="input" />
        <div v-if="form.errors.street" class="input-error">
          {{ form.errors.street }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="label">Street Number</label>
        <input v-model="form.street_num" type="text" class="input" />
        <div v-if="form.errors.street_num" class="input-error">
          {{ form.errors.street_num }}
        </div>
      </div>

      <div class="col-span-6">
        <label class="label">Price</label>
        <input v-model.number="form.price" type="text" class="input" />
        <div v-if="form.errors.price" class="input-error">
          {{ form.errors.price }}
        </div>
      </div>

      <div>
        <button type="submit" class="btn-primary">
          Create
        </button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm, Link } from '@inertiajs/inertia-vue3'

const form = useForm({
  bedrooms: 0,
  bathrooms: 0,
  area: 0,
  city: null,
  zipcode: null,
  street: null,
  street_num: null,
  price: 0,
})
const create = () => form.post(route('listing.store'))
</script>

<style scoped>
    label {
        margin-right: 2em;
    }

    div {
        padding: 2px
    }
</style>
