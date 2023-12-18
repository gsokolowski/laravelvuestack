<template>
    <div>
        <h1>Index</h1>
        <p>The message is {{ message }}</p>
    </div>
</template>

<script setup>
// import passed prop 'message' from incexController
import { Link } from "@inertiajs/vue3";

defineProps({
    message: String,
});
</script>

<script>
import MainLayout from "../../Layouts/MainLayout.vue";
export default {
    layout: MainLayout, //inertia will load this template into MainLayout definded in MainLayout.vue
};
</script>
