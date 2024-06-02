<script setup>
import { ref } from "vue";
const page = usePage();
const locale = computed(() => page.props.locale);
</script>
<template>
    <div class="relative min-h-screen py-12 bg-primary">
        <div class="container grid min-h-screen gap-6 lg:grid-cols-2">
            <div>
                <div class="flex items-center justify-between mb-12">
                    <ApplicationLogo class="text-white" />
                    <LangSwitcher />
                </div>
                <h1
                    class="text-4xl font-medium text-white font-alegreya-sans-sc"
                >
                    {{ $t("find-your-perfect-ride-with-us") }}
                </h1>
                <p class="mt-3 text-xl text-primary-300">
                    {{
                        $t(
                            "transforming-events-into-unforgettable-memories-join-the-celebration-and-create-your-own-story"
                        )
                    }}
                </p>

                <div
                    class="max-w-[31rem] absolute start-0 mt-6 max-lg:hidden"
                    :style="[locale == 'ar' && 'transform: rotateY(180deg);']"
                >
                    <img
                        src="/images/authentication_bg.png"
                        role="presentation"
                    />
                </div>
            </div>
            <main class="self-center">
                <section class="p-12 bg-white rounded-2xl">
                    <slot />
                </section>
            </main>
        </div>
    </div>
</template>
