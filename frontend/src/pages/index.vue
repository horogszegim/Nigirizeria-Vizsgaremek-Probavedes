<script setup>
import BaseLayout from '@layouts/BaseLayout.vue'

import { useCartStore } from '@stores/CartStore';

const cart = useCartStore()
</script>

<template>
  <BaseLayout>
    <h1>Köszöntelek a weblapunkon!</h1>
  </BaseLayout>
</template>

<route lang="yaml">
name: index
meta:
  title: Főoldal
</route>
