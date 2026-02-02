<script setup>
import { useCartStore } from '@stores/CartStore';

const cart = useCartStore()
</script>

<template>
  <header class="w-full border-b border-gray-400 bg-gray-50">
    <nav class="w-full mx-auto flex items-center justify-between px-50 py-2">
      <RouterLink to="/" class="flex items-center gap-3">
        <img src="https://i.ibb.co/Ld4BZYWS/crop-logo.png" alt="logo" class="h-16 w-auto pb-1" />
        <span class="text-3xl font-bold text-text-primary">
          Nigirizéria
        </span>
      </RouterLink>

      <ul class="flex items-center text-2xl gap-12 text-text-primary font-medium">
        <li>
          <RouterLink to="/"
            class="relative inline-block transition-all duration-200 ease-out hover:text-salmon-dark hover:scale-[1.05]">
            Főoldal
          </RouterLink>
        </li>

        <li>
          <RouterLink to="/etlap"
            class="relative inline-block transition-all duration-200 ease-out hover:text-salmon-dark hover:scale-[1.05]">
            Étlap
          </RouterLink>
        </li>

        <li>
          <RouterLink to="/asztalfoglalas"
            class="relative inline-block transition-all duration-200 ease-out hover:text-salmon-dark hover:scale-[1.05]">
            Asztalfoglalás
          </RouterLink>
        </li>

        <li>
          <RouterLink to="/kapcsolat"
            class="relative inline-block transition-all duration-200 ease-out hover:text-salmon-dark hover:scale-[1.05]">
            Kapcsolat
          </RouterLink>
        </li>

        <li>
          <RouterLink to="/kosar" class="relative">
            <img src="https://i.ibb.co/Jw8K9BKr/cart.png" alt="kosár" class="h-8 w-auto pt-1" />

            <span v-if="cart.itemCount > 0"
              class="absolute -top-8 -right-7 min-w-[18px] h-[18px] px-1 rounded-full bg-salmon-dark text-white text-xs flex items-center justify-center">
              {{ cart.itemCount > 9 ? '9+' : cart.itemCount }}
            </span>
          </RouterLink>
        </li>
      </ul>

    </nav>
  </header>
</template>
