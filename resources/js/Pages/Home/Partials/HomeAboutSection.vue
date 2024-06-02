<script setup lang="ts">
const reasons = [
    {
        id: (Math.random() * 1000).toFixed(),
        title: "How We Started",
        description:
            "At Bikerz, we pride ourselves on our commitment to delivering exceptional user experiences. At Bird Solution, we pride ourselves on our commitment to delivering exceptional user experiences. ",
    },
    {
        id: (Math.random() * 1000).toFixed(),
        title: "Our Vision",
        description:
            "At Bikerz, we pride ourselves on our commitment to delivering exceptional user experiences. At Bird Solution, we pride ourselves on our commitment to delivering exceptional user experiences. ",
    },
    {
        id: (Math.random() * 1000).toFixed(),
        title: "Our Mission",
        description:
            "At Bikerz, we pride ourselves on our commitment to delivering exceptional user experiences. At Bird Solution, we pride ourselves on our commitment to delivering exceptional user experiences. ",
    },
];
</script>
<template>
    <section aria-labelledby="about-title" class="container space-y-6">
        <div class="home-header">
            <h2 id="about-title" class="home-title">
                {{ $t("about-bikerz") }}
            </h2>
            <p class="max-w-xs text-primary-600 line-clamp-2">
                {{
                    $t(
                        "discover-the-perfect-events-for-every-interest-and-passion"
                    )
                }}
            </p>
        </div>
        <div class="grid gap-6 lg:grid-cols-2">
            <article class="self-center space-y-6 max-lg:order-2">
                <template v-for="reason in reasons" :key="reason.id">
                    <article :class="['relative ps-12']">
                        <div
                            class="absolute flex flex-col items-center w-6 h-full gap-2 top-1.5 -start-0"
                        >
                            <span
                                class="block rounded size-5 bg-primary shrink-0"
                            ></span>
                            <span
                                class="block w-0.5 h-full rounded bg-primary"
                            ></span>
                        </div>
                        <h3 class="text-2xl font-semibold text-primary">
                            {{ reason.title }}
                        </h3>
                        <p class="mt-2 text-sm text-primary-600">
                            {{ reason.description }}
                        </p>
                    </article>
                </template>
            </article>
            <div class="max-lg:order-1">
                <img
                    :src="'/images/home_about_bg.webp'"
                    class="object-cover w-full max-w-md mx-auto"
                />
            </div>
        </div>
    </section>
</template>
