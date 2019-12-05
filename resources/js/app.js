import 'instantsearch.css/themes/algolia.css';
require('./bootstrap');

$(document).ready(function() {
    Waves.attach('.btn-waves', ['waves-float']);
    Waves.init();
})

// Vue.component('my-search', require('./components/MySearch.vue').default);
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// Vue.filter("highlight", function(words, query) {
//     var iQuery = new RegExp(query, "gi");
//     return words.toString().replace(iQuery, function(matchedText, a, b) {
//         return ('<span class="highlight">' + matchedText + '</span>');
//     });
// })

const app = new Vue({
    el: '#swordfish',
    data: {
        entry_type: "uid",
        search_query: null,
        entries: [],
        loading: false,
    },
    created() {
        // console.log(base_url)
        this.fetchEntries();
    },
    methods: {
        submitQuery: function() {
            // console.log(this.entry_type);
            // console.log(this.search_query);
            return this.fetchEntries();
        },
        fetchEntries: function() {
            
            this.loading = true;

            let entry_type = this.entry_type;
            let search_query = this.search_query;

            return axios.get(base_url + "/entries/search", { params: { entry_type: this.entry_type, search_query: this.search_query }})
                .then((res) => {
                    this.loading = false;
                    return this.entries = res.data;
                });
        },
        highlight: function(words) {
            
            if(!this.search_query) {
                return words;
            }

            var iQuery = new RegExp(this.search_query, "ig");

            return words.toString().replace(iQuery, function(matchedText) {
                console.log(`Matched Text: ${matchedText}`)
                return ('<span class="highlight-text">' + matchedText + '</span>');
            });
        }
    },
});
