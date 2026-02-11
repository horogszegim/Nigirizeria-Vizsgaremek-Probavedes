<script setup></script>

<template>
    <footer class="w-full border-t border-gray-400 bg-gray-50">
        <div class="mx-auto max-w-7xl px-10 py-10">
            <div class="grid gap-10 md:grid-cols-4 justify-items-center">

                <div class="flex flex-col items-center w-full max-w-xs">
                    <div class="mb-5 flex items-center gap-3 w-full">
                        <img src="https://i.ibb.co/Ld4BZYWS/crop-logo.png" alt="logo" class="h-15 w-auto pb-1" />
                        <span class="text-2xl font-bold text-text-primary">
                            Nigirizéria
                        </span>
                    </div>
                    <p class="text-sm leading-relaxed text-text-muted text-left">
                        Speciális pizzára vágysz? Mondjuk egy <i>Nigiri Lazacos</i>ra? Tökéletes helyen jársz. Örülünk,
                        hogy itt vagy!
                    </p>
                </div>

                <div class="flex flex-col items-center w-full max-w-xs">
                    <h3 class="mb-5 text-lg font-semibold text-text-primary w-full text-left">Helyszín</h3>
                    <ul class="space-y-1 text-sm text-text-muted w-full text-left">
                        <li>Budapest, Hold utca 5.</li>
                        <li>1054 Budapest</li>
                        <li>Magyarország</li>
                    </ul>
                </div>

                <div class="flex flex-col items-center w-full max-w-xs">
                    <h3 class="mb-5 text-lg font-semibold text-text-primary w-full text-left">Nyitvatartás</h3>
                    <ul class="space-y-1 text-sm text-text-muted w-full text-left">
                        <li class="flex justify-between gap-5">
                            <span>Hétfő - Csütörtök</span>
                            <span>11:00 - 22:00</span>
                        </li>
                        <li class="flex justify-between gap-5">
                            <span>Péntek - Szombat</span>
                            <span>11:00 - 23:00</span>
                        </li>
                        <li class="flex justify-between gap-5">
                            <span>Vasárnap</span>
                            <span>12:00 - 22:00</span>
                        </li>
                    </ul>
                </div>

                <div class="flex flex-col items-center w-full max-w-xs">
                    <h3 class="mb-5 text-lg font-semibold text-text-primary w-full text-left">Kapcsolat</h3>
                    <ul class="space-y-3 text-sm text-text-muted w-full text-left">
                        <li class="flex items-center gap-3">
                            <span>📞</span>
                            <span>+36 1 234 5678</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span>✉️</span>
                            <span>info@nigirizeria.hu</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="border-t border-gray-400">
            <nav
                class="mx-auto max-w-7xl px-12 py-6 flex flex-wrap justify-center gap-10 text-lg font-medium text-gray-700">
                <RouterLink to="/" class="transition-all duration-200 hover:text-salmon-dark hover:scale-[1.05]">
                    Főoldal
                </RouterLink>
                <RouterLink to="/etlap" class="transition-all duration-200 hover:text-salmon-dark hover:scale-[1.05]">
                    Étlap
                </RouterLink>
                <RouterLink to="/asztalfoglalas"
                    class="transition-all duration-200 hover:text-salmon-dark hover:scale-[1.05]">
                    Asztalfoglalás
                </RouterLink>
            </nav>
        </div>

        <div class="border-t border-gray-400">
            <div class="mx-auto max-w-7xl px-12 py-4 text-center text-sm text-text-muted">
                2026 © Nigirizéria. Minden jog fenntartva.
            </div>
        </div>
    </footer>
</template>
