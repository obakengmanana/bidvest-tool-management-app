<template>
  <div>
      <Head title="Dashboard" />
      <p class="mb-8 leading-normal">
          Welcome to Bidvest Tool Management App
      </p>
  </div>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import Layout from "@/Shared/Layout.vue";

export default {
  components: {
      Head,
  },
  layout: Layout,
};
</script>
