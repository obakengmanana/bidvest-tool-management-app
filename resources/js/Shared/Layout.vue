<template>
    <div class="min-h-full">
        <Navigation />
        <div
            class="px-4 py-8 md:flex-1 md:p-12 md:overflow-y-auto"
            scroll-region
        >
            <flash-messages />
            <slot />
        </div>
    </div>
  </template>
  
  <script>
  import { Inertia } from "@inertiajs/inertia";
  import { Link } from '@inertiajs/inertia-vue3'
  import Navigation from "@/Components/Navigation.vue";
  import FlashMessages from '@/Shared/FlashMessages.vue'
  
  
  export default {
    components: {
        Navigation,
    }
  };
  </script>
  