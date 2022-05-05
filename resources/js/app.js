require('./bootstrap');
import { createApp } from 'vue';
import axios from 'axios'
import CalculatorComponent from './components/CalculatorComponent.vue';

let app = createApp({});

// Calculator Component
app.component('CalculatorComponent' , CalculatorComponent);

app.mount("#app")