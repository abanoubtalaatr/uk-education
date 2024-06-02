<script setup lang="ts">
const props = defineProps<{
    event: Resource<TEvent>;
}>();
</script>
<template>
    <div class="grid md:grid-cols-[20rem,1fr] rounded-2xl overflow-hidden">
        <div class="max-h-[20rem] w-full relative">
            <img
                :src="
                    event.data.featured_image
                        ? event.data.featured_image
                        : getImgPlaceholder(props.event.data?.name)
                "
                class="w-full aspect-square"
            />
            <EventDateCard :date="event.data.start_date" />
        </div>
        <div
            class="relative bg-center bg-no-repeat bg-cover"
            :style="{
                backgroundImage: `url(${
                    event.data.featured_image
                        ? event.data.featured_image
                        : getImgPlaceholder(props.event.data?.name)
                })`,
            }"
        >
            <div
                class="grid h-full p-6 space-y-3 place-content-center bg-white/60 backdrop-blur-md"
            >
                <h2 class="text-3xl font-semibold">
                    {{ event.data.name }}
                </h2>
                <p
                    class="text-xl line-clamp-3"
                    v-html="event.data.description"
                />
                <time class="text-lg font-medium uppercase text-primary"
                    >{{
                        $t("start-at-date", {
                            date: formatDate(event.data.start_date),
                        })
                    }}
                </time>
                <time class="text-lg font-medium uppercase text-primary"
                    >{{
                        $t("end-at-date", {
                            date: formatDate(event.data.end_date),
                        })
                    }}
                </time>
            </div>
        </div>
    </div>
</template>
