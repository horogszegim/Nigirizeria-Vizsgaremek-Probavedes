<script setup>
import BaseHeader from '@components/layout/BaseHeader.vue';
import BaseFooter from '@components/layout/BaseFooter.vue';
</script>

<template>
  <BaseHeader />
  <main class="container mx-auto">
    <slot />
  </main>
  <BaseFooter />
</template>
