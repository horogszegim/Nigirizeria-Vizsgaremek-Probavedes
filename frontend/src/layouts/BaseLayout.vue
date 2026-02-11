<script setup>
import BaseHeader from '@components/layout/BaseHeader.vue'
import BaseFooter from '@components/layout/BaseFooter.vue'
</script>

<template>
  <div class="min-h-screen flex flex-col">
    <BaseHeader />

    <main class="container mx-auto flex-1 flex">
      <slot />
    </main>

    <BaseFooter />
  </div>
</template>
