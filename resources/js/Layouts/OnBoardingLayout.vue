<script setup>
import { ref } from "vue";
import { usePage } from "@inertiajs/vue3";
const props = defineProps({
    imageSrc: String,
    title: String,
    subtitle: String,
    step: Number,
});
const active = ref(usePage().props.step);

const width = ((props.step + 1) * 100) / 6;
</script>

<template>
    <div class="container">
        <div class="grid items-start min-h-screen gap-16 py-6 lg:grid-cols-2">
            <main class="">
                <div class="flex items-center justify-between">
                    <ApplicationLogo class="text-black" />
                    <LangSwitcher />
                </div>
                <div class="px-6 mt-16">
                    <div class="w-full bg-gray-200 rounded-full">
                        <div
                            class="h-2 bg-gray-900 rounded-full"
                            :style="`width: ${width}%`"
                        ></div>
                    </div>
                    <div class="flex items-end justify-end mt-3">
                        {{ step + 1 }}
                        <span class="text-sm text-gray-600">
                            / 6 {{ $t("steps") }}
                        </span>
                    </div>
                    <header class="my-4">
                        <h2 class="text-2xl font-semibold text-primary">
                            {{ title }}
                        </h2>
                        <p class="text-sm text-primary-600">
                            {{ subtitle }}
                        </p>
                    </header>
                    <section>
                        <slot></slot>
                    </section>
                </div>
            </main>
            <div class="hidden overflow-hidden rounded-lg lg:block">
                <img
                    :src="imageSrc"
                    alt="Personal information"
                    class="object-cover h-full"
                />
            </div>
        </div>
    </div>
</template>
