<template>
    <card class="flex flex-col items-center justify-center">
        <div class="px-3 py-3">
            <h1 class="text-center text-3xl text-80 font-light">Most visited pages in the last 7 days</h1>
        </div>
        <div v-if="!pages">
            <p class="text-80 font-bold">No Data</p>
        </div>
        <div v-else class="ga4-most-visited-list">
            <ul>
                <li v-for="page in pages">
                    <span class="views">{{ page.screenPageViews }}</span>
                    <a :href="`https://${page.fullPageUrl}`" target="_blank">{{ page.pageTitle }}</a>
                </li>
            </ul>
        </div>
    </card>
</template>

<script>
export default {
    props: [
        'card',

        // The following props are only available on resource detail cards...
        // 'resource',
        // 'resourceId',
        // 'resourceName',
    ],

    data: function() {
        return {
            pages: [],
        }
    },

    mounted() {
        Nova.request().get('/nova-vendor/ga4-analytics/most-visited-pages').then(response => {
            this.pages = response.data;
        });
    },
}
</script>
