import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler';
import InspectionSearch from './components/InspectionSearch.vue'

const app = createApp({});

app.component('inspection-search', InspectionSearch);

app.mount('#tool');