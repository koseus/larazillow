<template>
  <form>
    <div class="mb-8 mt-4 flex flex-wrap gap-2">
      <div class="flex flex-nowrap items-center">
        <input
          type="text" placeholder="Price from"
          class="input-filter-l w-28"
        />
        <input
          type="text" placeholder="Price up to"
          class="input-filter-r w-28"
        />
      </div>

      <div class="flex flex-nowrap items-center">
        <select class="input-filter-l w-32">
          <option :value="null">Bedrooms</option>
          <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
          <option>6+</option>
        </select>

        <select class="input-filter-r w-30">
          <option :value="null">Bathrooms</option>
          <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
          <option>6+</option>
        </select>
      </div>

      <div class="flex flex-nowrap items-center">
        <input
          type="text" placeholder="Area from"
          class="input-filter-l w-28"
        />
        <input
          type="text" placeholder="Area up to"
          class="input-filter-r w-28"
        />
      </div>

      <button type="submit" class="btn-normal">Filter</button>
      <button type="reset" class="btn-normal">Reset</button>
    </div>
  </form>
</template>
