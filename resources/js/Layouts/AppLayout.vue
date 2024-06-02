<script setup>
defineProps({
    title: String,
});
</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <div class="min-h-screen">
            <Navbar />
            <FlashMsg />

            <main class="min-h-screen py-6 page-wrapper">
                <slot />
            </main>
            <Footer />
        </div>
    </div>
</template>
