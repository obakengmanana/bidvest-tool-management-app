import { createApp, h } from 'vue'
import { InertiaProgress } from '@inertiajs/progress'
import { createInertiaApp } from '@inertiajs/inertia-vue3'

import DashboardIndex from './Pages/Dashboard/Index.vue';
import ToolsCreate from './Pages/Tools/Create.vue';
import ToolsEdit from './Pages/Tools/Edit.vue';
import ToolsIndex from './Pages/Tools/Index.vue';



// Import other components as needed

InertiaProgress.init()

createInertiaApp({
  resolve: async (name) => {
    // Manually map component names to their corresponding imports
    const componentMap = {
      'Dashboard/Index': DashboardIndex,
      'Tools/Create': ToolsCreate,
      'Tools/Edit': ToolsEdit,
      'Tools/Index': ToolsIndex,
      // Add other component mappings here
    };

    // Check if the component exists in the map and return it
    if (componentMap[name]) {
      return componentMap[name];
    } else {
      // Handle error if component not found
      console.error(`Component '${name}' not found`);
      return null;
    }
  },
  title: (title) => (title ? `${title}` : 'Bidvest Tool Management System'),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el);
  },
});
