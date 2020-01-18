/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

// ------------------------------------------------------------------------

function _modal (e_id) { // Class name of element requested to show
    let e = document.getElementById(e_id)
    if (e.style.display = 'none') {
        e.style.display = 'block'
        return
    }
    e.style.display = 'none'
}

// ------------------------------------------------------------------------

const style_inputs = document.querySelectorAll('.input__input--style')

style_inputs.forEach(input => {
    input.addEventListener('blur', _ => checkValue(input))
    checkValue(input)
})

function checkValue (input) {
    input.value !== '' ?
        input.classList.add('input--active') :
        input.classList.remove('input--active')
}