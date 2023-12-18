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
