<script setup lang="ts">
const services = computed(() => [
    {
        id: (Math.random() * 1000).toFixed(),
        title: trans("service-name-one"),
        description: trans(
            "discover-the-perfect-events-for-every-interest-and-passion"
        ),
    },
    {
        id: (Math.random() * 1000).toFixed(),
        title: trans("service-two"),
        description: trans(
            "discover-the-perfect-events-for-every-interest-and-passion"
        ),
    },
    {
        id: (Math.random() * 1000).toFixed(),
        title: trans("service-three"),
        description: trans(
            "discover-the-perfect-events-for-every-interest-and-passion"
        ),
    },
]);
</script>
<template>
    <section aria-labelledby="our-services-title" class="space-y-6 bg-primary">
        <div class="container flex gap-10 py-12 max-lg:flex-col">
            <h2
                id="our-services-title"
                class="w-full max-w-sm text-white home-title"
            >
                {{ $t("our-services") }}
            </h2>
            <div class="grid gap-6 lg:grid-cols-3">
                <template v-for="service in services" :key="service.id">
                    <article class="text-white">
                        <h3 class="text-3xl font-bold font-alegreya-sans-sc">
                            {{ service.title }}
                        </h3>
                        <p class="mt-1">{{ service.description }}</p>
                    </article>
                </template>
            </div>
        </div>
    </section>
</template>
