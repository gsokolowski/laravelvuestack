<template>
    <div>
        <Link href="/">Main Page</Link>&nbsp;
        <Link href="/hello">Hello Page</Link>
        <div>The page with time {{ timer }}</div>
        <slot>Default</slot>
        <!-- slot will keep loaded content by inertia persisten layout loading-->
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
const timer = ref(0);
setInterval(() => timer.value++, 1000);

//console.log(timer.value);
</script>

<style lang="scss"></style>
