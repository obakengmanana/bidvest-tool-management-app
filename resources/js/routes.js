import Home from './Shared/Layout.vue'
//import EditToolComponent from '@/Pages/ToolEdit.vue';

const routes = [
  { path: '/', component: Home },
 //{ path: '/tool/edit/:toolId', component: EditToolComponent, props: true },
]

export const editTool = (toolId) => `/tool/edit/${toolId}`;

export default routes