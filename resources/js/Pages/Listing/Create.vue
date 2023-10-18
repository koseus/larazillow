<template>
  <form @submit.prevent="create">
    <div>
      <div>
        <label>Bedrooms</label>
        <input v-model.number="form.bedrooms" type="text" />
        <div v-if="form.errors.bedrooms">
          {{ form.errors.bedrooms }}
        </div>
      </div>

      <div>
        <label>Bathrooms</label>
        <input v-model.number="form.bathrooms" type="text" />
        <div v-if="form.errors.bathrooms">
          {{ form.errors.bathrooms }}
        </div>
      </div>

      <div>
        <label>Area</label>
        <input v-model.number="form.area" type="text" />
        <div v-if="form.errors.area">
          {{ form.errors.area }}
        </div>
      </div>

      <div>
        <label>City</label>
        <input v-model="form.city" type="text" />
        <div v-if="form.errors.city">
          {{ form.errors.city }}
        </div>
      </div>

      <div>
        <label>Zipcode</label>
        <input v-model="form.zipcode" type="text" />
        <div v-if="form.errors.zipcode">
          {{ form.errors.zipcode }}
        </div>
      </div>

      <div>
        <label>Street</label>
        <input v-model="form.street" type="text" />
        <div v-if="form.errors.street">
          {{ form.errors.street }}
        </div>
      </div>

      <div>
        <label>Street Number</label>
        <input v-model="form.street_num" type="text" />
        <div v-if="form.errors.street_num">
          {{ form.errors.street_num }}
        </div>
      </div>

      <div>
        <label>Price</label>
        <input v-model.number="form.price" type="text" />
        <div v-if="form.errors.price">
          {{ form.errors.price }}
        </div>
      </div>

      <div>
        <button type="submit">Create</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

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
const create = () => form.post('/listing', form)
</script>

<style scoped>
    label {
        margin-right: 2em;
    }

    div {
        padding: 2px
    }
</style>
