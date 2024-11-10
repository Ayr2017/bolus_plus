import './bootstrap';
import 'bootstrap';
import Dasboard from './components/Dasboard.vue'

import { createApp } from 'vue'

const app = createApp()
app.component('dashboard', Dasboard)

app.mount('#dashboard')
