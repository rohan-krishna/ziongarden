import 'instantsearch.css/themes/algolia.css';
require('./bootstrap');

$(document).ready(function() {
    Waves.attach('.btn-waves', ['waves-float']);
    Waves.init();
})

Vue.component('my-search', require('./components/MySearch.vue').default);
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
const app = new Vue({
    el: '#swordfish',
});
