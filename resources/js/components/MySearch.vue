<template>
  <ais-instant-search
    :search-client="searchClient"
    index-name="contacts"
  >
    <!-- Other search components go here -->
    <ais-search-box placeholder="Search contacts..." :class="form-control"></ais-search-box>

    <ais-hits>
        <template
            slot="item"
            slot-scope="{ item }"
        >
            <h1>
                <ais-highlight
                    :hit="item"
                    attribute="name"
                />
            </h1>
            <h4>
                <ais-highlight
                    :hit="item"
                    attribute="company"
                /> -
                <ais-highlight
                    :hit="item"
                    attribute="state"
                />
                <ais-highlight
                    :hit="item"
                    attribute="email"
                />
            </h4>
        </template>
    </ais-hits>
  </ais-instant-search>
</template>

<script>
import algoliasearch from 'algoliasearch/lite';

export default {
  data() {
    return {
      searchClient: algoliasearch(
        process.env.MIX_ALGOLIA_APP_ID,
        process.env.MIX_ALGOLIA_SEARCH
      ),
    };
  },
};
</script>