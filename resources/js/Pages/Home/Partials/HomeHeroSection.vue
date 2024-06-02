<script setup lang="ts">
const statistics = computed(() => [
    { label: "Coverage", value: "2M" },
    { label: "Coverage", value: "280M" },
    { label: "Coverage", value: "22%" },
]);
</script>
<template>
    <section class="relative min-h-svh" :aria-labelledby="'home-hero-title'">
        <div
            :style="{
                '-webkit-text-fill-color': 'transparent',
            }"
            :class="[
                'font-bold uppercase text-center font-alegreya-sans-sc  text-5xl md:text-[7rem] ',
                'bg-gradient-to-b from-primary-950/30 to-white to-90% bg-clip-text',
                'absolute w-full',
            ]"
        >
            {{ $t("dont-speed") }}
        </div>
        <div class="container relative z-10 h-full pt-24">
            <Slider :list="[1, 2, 3]" :options="{ autoplay: true }">
                <div
                    class="flex items-center justify-between gap-6 max-lg:flex-col"
                >
                    <h2
                        id="home-hero-title"
                        class="text-4xl font-bold font-alegreya-sans-sc"
                    >
                        {{ $t("your-journey-starts-here") }}
                    </h2>
                    <div>
                        <img :src="'/images/hero_img.webp'" />
                    </div>
                    <p class="text-lg text-primary-600">
                        {{
                            $t(
                                "discover-the-perfect-events-for-every-interest-and-passion"
                            )
                        }}
                    </p>
                </div>
            </Slider>
            <div
                class="flex items-center justify-between max-w-md mx-auto text-center"
            >
                <template v-for="(stat, index) in statistics" :key="index">
                    <div>
                        <div class="text-3xl font-bold font-alegreya-sans-sc">
                            {{ stat.value }}
                        </div>
                        <div class="text-lg font-medium text-primary-600">
                            {{ stat.label }}
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>
</template>
