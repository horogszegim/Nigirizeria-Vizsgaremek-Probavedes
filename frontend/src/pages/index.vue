<script setup>
import BaseLayout from '@/layouts/BaseLayout.vue'
</script>

<template>
  <BaseLayout>
    <div class="w-full flex justify-center items-center min-h-[70vh]">
      <div class="flex flex-col items-center text-center space-y-6">

        <img src="https://i.ibb.co/Ld4BZYWS/crop-logo.png" alt="Nigirizéria" class="w-32 h-32 object-contain" />

        <h1 class="text-4xl md:text-5xl font-semibold">
          Nigirizéria
        </h1>

        <p class="text-lg text-gray-600">
          Speciális pizzára vágysz? Mondjuk egy <i>Nigiri Lazacos</i>ra? Tökéletes helyen jársz. Örülünk, hogy itt vagy!
        </p>

        <div class="flex flex-col sm:flex-row gap-4 pt-4">

          <router-link to="/asztalfoglalas"
            class="px-6 py-3 bg-salmon-dark text-white rounded-lg cursor-pointer transition-all duration-200 ease-out hover:bg-salmon hover:scale-105 active:scale-95">
            Asztalfoglalás
          </router-link>

          <router-link to="/etlap"
            class="px-6 py-3 bg-salmon-dark text-white rounded-lg cursor-pointer transition-all duration-200 ease-out hover:bg-salmon hover:scale-105 active:scale-95">
            Étlap
          </router-link>

          <router-link to="/kosar"
            class="px-6 py-3 bg-salmon-dark text-white rounded-lg cursor-pointer transition-all duration-200 ease-out hover:bg-salmon hover:scale-105 active:scale-95">
            Kosár / Online rendelés
          </router-link>

        </div>

      </div>
    </div>
  </BaseLayout>
</template>

<route lang="yaml">
meta:
  title: Főoldal
</route>
