import Vue from 'vue';
import VueRouter from 'vue-router';
const foo ={template: "<v-alert type='error'>im foo componet</v-alert>"}
const bar ={template: "<v-alert type='error'>im boo componet</v-alert>"}

Vue.use(VueRouter)
const routes =[
{
path: '/foo',
componet: foo,
},
{
path: '/bar',
componet: bar,
},
]

export default new VueRouter({routes})