<template>
  <div>
    <Head title="Tools" />
    <h1 class="mb-8 text-3xl font-bold">Tools</h1>
    <div class="flex items-center justify-between mb-6">
      <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">
        <label class="block text-gray-700">Trashed:</label>
        <select v-model="form.trashed" class="form-select mt-1 w-full">
          <option :value="null" />
          <option value="with">With Trashed</option>
          <option value="only">Only Trashed</option>
        </select>
      </search-filter>
      <Link class="btn-indigo" href="/tool/create">
        <span>Create</span>
        <span class="hidden md:inline">&nbsp;Tool</span>
      </Link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-6">Name</th>
          <th class="pb-4 pt-6 px-6">Description</th>
          <th class="pb-4 pt-6 px-6">Category</th>
          <th class="pb-4 pt-6 px-6" colspan="2">Actions</th>
        </tr>
        <tr v-for="tool in tools.data" :key="tool.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
            <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/tool/${tool.id}/edit`">
              {{ tool.name }}
              <icon v-if="tool.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/tool/${tool.id}/edit`" tabindex="-1">
              <div v-if="tool.description">
                {{ tool.description }}
              </div>
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/tool/${tool.id}/edit`" tabindex="-1">
              {{ categoryNames[tool.category_id] }}
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/tool/${tool.id}/edit`" tabindex="-1">
              Edit
            </Link>
          </td>
          <td class="w-px border-t">
            <Link class="flex items-center px-4" :href="`/tool/${tool.id}/edit`" tabindex="-1">
              <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
            </Link>
          </td>
        </tr>
        <tr v-if="tools.data.length === 0">
          <td class="px-6 py-4 border-t" colspan="4">No Tools found.</td>
        </tr>
      </table>
    </div>
    <pagination class="mt-6" :links="tools.links" />
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon.vue'
import pickBy from 'lodash/pickBy'
import Layout from '@/Shared/Layout.vue'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/Pagination.vue'
import SearchFilter from '@/Shared/SearchFilter.vue'

export default {
  components: {
    Head,
    Icon,
    Link,
    Pagination,
    SearchFilter,
  },
  computed: {
    // Map category_id to category name
    categoryNames() {
      return this.categories.reduce((map, category) => {
        map[category.id] = category.name;
        return map;
      }, {});
    },
  },
  layout: Layout,
  props: {
    filters: Object,
    tools: Object,
    categories: Object,
  },
  data() {
  return {
    form: {
      search: this.filters.search || '', // Use a default value if this.filters.search is undefined
      trashed: this.filters.trashed || null, // Use a default value or null if this.filters.trashed is undefined
    },
  };
},
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get('/tools', pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>
