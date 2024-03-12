<template>
  <div>
    <Head title="Tool Edit" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/toolspage">Tools</Link>
      <span class="text-indigo-400 font-medium">/</span>
      {{ form.tool_name }}
    </h1>
    <trashed-message v-if="tool.deleted_at" class="mb-6" @restore="restore"> This tool has been deleted. </trashed-message>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="update">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.tool_name" :error="form.errors.tool_name" class="pb-8 pr-6 w-full lg:w-1/2" label="Tool Name" />
          <text-input v-model="form.description" :error="form.errors.description" class="pb-8 pr-6 w-full lg:w-1/2" label="Description" />
          <select-input v-model="form.category_id" :error="form.errors.category_id" class="pb-8 pr-6 w-full lg:w-1/2" label="Category" @change="updateCategoryId">
            <option :value="null" />
            <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
          </select-input>
        </div>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <button v-if="!tool.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Delete Contact</button>
          <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Update Tool</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Shared/Layout.vue'
import TextInput from '@/Shared/TextInput.vue'
import SelectInput from '@/Shared/SelectInput.vue'
import LoadingButton from '@/Shared/LoadingButton.vue'
import TrashedMessage from '@/Shared/TrashedMessage.vue'

export default {
  components: {
    Head,
    Link,
    LoadingButton,
    SelectInput,
    TextInput,
    TrashedMessage,
  },
  layout: Layout,
  props: {
    tool: Object,
    categories: Array,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        tool_name: this.tool.tool_name,
        description: this.tool.description,
        category_id: this.tool.category_id,
      }),
    }
  },
  methods: {
    update() {
      this.form.put(`/tool/${this.tool.id}`)
    },
    destroy() {
      if (confirm('Are you sure you want to delete this contact?')) {
        this.$inertia.delete(`/tool/${this.tool.id}`)
      }
    },
    restore() {
      if (confirm('Are you sure you want to restore this contact?')) {
        this.$inertia.put(`/tool/${this.tool.id}/restore`)
      }
    },
    updateCategoryId(event) {
      this.form.category_id = event.target.value;
    },
  },
}
</script>
