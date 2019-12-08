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

Vue.component('InfiniteLoading', require('vue-infinite-loading'));

const app = new Vue({
    el: '#swordfish',
    data: {
        entry_type: "uid",
        search_query: null,
        entries: [],
        loading: false,
        page: 1,
        last_page: 0,
        current_page: 0,
        total: 0,
        base_url: base_url,
    },
    created() {
        // console.log(base_url)
        this.fetchEntries();
    },
    updated() {
        // console.log("Page", this.page);
        // console.log("Last Page", this.last_page);
        // console.log("Current Page", this.current_page);
        // console.log("Total", this.total);
    },
    methods: {
        submitQuery: function() {
            // console.log(this.entry_type);
            // console.log(this.search_query);
            return this.fetchEntries();
        },
        fetchEntries: function() {
            
            this.loading = true;

            return axios.get(base_url + "/entries/search", { params: { entry_type: this.entry_type, search_query: this.search_query, page: this.page }})
                .then((res) => {
                    this.loading = false;
                    this.last_page = res.data.last_page;
                    this.current_page = res.data.current_page;
                    this.total = res.data.total;

                    return this.entries = res.data.data; 
                });
        },
        highlight: function(words) {
            
            if(!this.search_query) {
                return words;
            }

            var iQuery = new RegExp(this.search_query, "ig");

            return words.toString().replace(iQuery, function(matchedText) {
                // console.log(`Matched Text: ${matchedText}`)
                return ('<span class="highlight-text">' + matchedText + '</span>');
            });
        },
        nextPage() {
            while (this.current_page != this.last_page) {
                this.page = this.page + 1;
                this.fetchEntries();
                break;
            }
        },
        prevPage() {
            while (this.current_page != 1) {
                this.page = this.page - 1;
                this.fetchEntries();
                break;
            }
        },
    },
});
