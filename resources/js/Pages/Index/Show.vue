<template>
    <div>
        <h1>Show Page</h1>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<script>
import MainLayout from "../../Layouts/MainLayout.vue";
export default {
    layout: MainLayout, //inertia will load this template into MainLayout definded in MainLayout.vue
};
</script>
