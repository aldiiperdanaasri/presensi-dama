<template>
    <nav>
        <ul :class="`pagination pagination-sm justify-content-${align} mb-0 mt-3`">
            <li :class="[
                'page-item',
                link.url == null ? 'disabled' : '',
                link.active ? 'active' : '',
            ]"
                v-for="(link, index) in links" :key="index">
                <Link class="page-link" :href="link.url === null ? '#' : link.url">
                <span v-html="link.label"></span>
                </Link>
            </li>
        </ul>
    </nav>
</template>

<script>
    import {
        Link
    } from '@inertiajs/vue3';

    export default {
        props: {
            links: Array,
            align: String
        },

        components: {
            Link,
        },
    }
</script>

<style>

</style>
