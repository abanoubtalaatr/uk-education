<script setup lang="ts">
const props = defineProps<{
    userEvents: Resource<TEvents>;
    upcomingEvents: Resource<TEvents>;
}>();
</script>
<template>
    <AppLayout>
        <div class="page-wrapper">
            <Head :title="$t('home')" />
            <HomeHeroSection />
            <HomeOurServicesSection />
            <HomeSliderEventsSection :events="userEvents.data" />
            <HomeEventsSection :events="upcomingEvents.data" />
            <HomeCallActionSection />
            <HomeAboutSection />
        </div>
    </AppLayout>
</template>
