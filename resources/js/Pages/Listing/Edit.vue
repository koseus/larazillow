<template>
  <form @submit.prevent="update">
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
        <label>ZipCode</label>
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
        <label>Street Num</label>
        <input v-model.number="form.street_num" type="text" />
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
const update = () => form.put(`/listing/${props.listing.id}`)
</script>

<style scoped>
label {
margin-right: 2em;
}

div {
padding: 2px
}
</style>
