<template>
    <div>
        <Link href="/listing">Listings</Link>&nbsp;
        <Link href="/listing/create">Add Listing</Link>

        <div v-if="flashSuccess" class="success">
            {{ flashSuccess }}
        </div>

        <div>The page with time {{ timer }}</div>
        <slot>Default</slot>
        <!-- slot will keep loaded content by inertia persisten layout loading-->
    </div>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3"; //not inertia-vue3
import { ref, computed } from "vue";

// page.props.flash.success
const page = usePage(); // hook used for flushing messages on website
const flashSuccess = computed(() => page.props.flash.success); // get access to flash massage

const timer = ref(0);
setInterval(() => timer.value++, 1000);

//console.log(timer.value);
//ssasaassa
</script>

<style scoped>
.success {
    background-color: green;
    color: white;
}
</style>

<style lang="scss"></style>
