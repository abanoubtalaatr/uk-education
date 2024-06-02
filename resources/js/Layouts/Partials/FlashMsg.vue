<script setup lang="ts">
import { Notivue, Notification, outlinedIcons } from "notivue";
</script>
<template>
    <Notivue v-slot="item">
        <Notification :item="item" :icons="outlinedIcons" />
    </Notivue>
</template>
