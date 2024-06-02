<script setup lang="ts">
const props = defineProps<{
    events: TEvents;
}>();
</script>
<template>
    <section
        aria-labelledby="slider-title"
        class="container space-y-6"
        v-if="events.length"
    >
        <div class="home-header">
            <h2 id="slider-title" class="home-title">
                {{ $t("your-next-events") }}
            </h2>
            <p class="max-w-xs text-primary-600 line-clamp-2">
                {{
                    $t(
                        "discover-the-perfect-events-for-every-interest-and-passion"
                    )
                }}
            </p>
        </div>
        <Slider
            v-if="events.length"
            :preset="'coverflow'"
            :list="events"
            :options="{
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                    dynamicMainBullets: 4,
                },
            }"
        >
            <template #default="{ item }">
                <MyEventsCard :event="item" />
            </template>
            <template #customNavigation>
                <div class="flex items-center justify-center gap-6 mt-6">
                    <Button
                        icon="i-radix-icons-chevron-left rtl:-scale-x-100"
                        data-swiper-prev
                        :aria-label="$t('go-previous')"
                        size="icon-sm"
                        variant="outline"
                    >
                    </Button>
                    <div
                        data-swiper-pagination
                        class="!static inline-flex gap-2 swiper-pagination w-fit"
                    ></div>
                    <Button
                        icon="i-radix-icons-chevron-right rtl:-scale-x-100"
                        data-swiper-next
                        :aria-label="$t('go-next')"
                        size="icon-sm"
                        variant="outline"
                    />
                </div>
            </template>
        </Slider>
        <Empty v-else :message="$t('not-events-yet')" />
    </section>
</template>
