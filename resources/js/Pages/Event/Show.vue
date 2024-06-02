<script setup lang="ts">
const props = defineProps<{
    event: Resource<TEvent>;
    survey: Resource<Survey>;
    attended: boolean;
}>();
</script>

<template>
    <EventShowLayout :attended="attended" :event="event">
        <!-- title & description -->
        <section class="space-y-3">
            <h3 class="title-2xl">{{ $t("event-details") }}</h3>
            <p class="text-primary-600" v-html="event.data.description" />
            <h3 class="title-2xl">{{ $t("itinerary") }}</h3>
            <p
                class="[&>ul]:list-disc [&>ul]:list-inside text-primary-600"
                v-html="event.data.agenda"
            />
            <div v-if="event.data.location_link">
                <h3 class="title-2xl">{{ $t("location") }}</h3>
                <Button
                    variant="link"
                    icon="i-heroicons-map"
                    :href="event.data.location_link"
                    target="_blank"
                    as="a"
                    >{{ $t("go-to-location") }}</Button
                >
            </div>
            <!-- interests  -->
            <template v-if="event.data.interests.length > 0">
                <h3 class="title-2xl">{{ $t("interests") }}</h3>
                <div
                    class="flex flex-wrap gap-2"
                    v-if="event.data.interests.length > 0"
                >
                    <template
                        v-for="interest in event.data.interests"
                        :key="interest.id"
                    >
                        <div
                            class="px-4 py-2 text-sm border rounded-2xl border-primary-200 bg-primary-50 text-primary-600"
                        >
                            {{ interest.name }}
                        </div>
                    </template>
                </div>
            </template>
        </section>
        <section class="space-y-4">
            <div class="flex items-center justify-between gap-2">
                <h3 class="title-2xl">
                    {{
                        $t("attendees-count", {
                            count: event.data.users.length.toString(),
                        })
                    }}
                </h3>
                <Button
                    :label="$t('view-all')"
                    :href="
                        route('events.details', [
                            event.data,
                            { tab: 'attendees' },
                        ])
                    "
                    variant="link"
                />
            </div>
            <div
                class="grid gap-6 md:grid-cols-2 lg:grid-cols-4"
                v-if="event.data.users.length > 0"
            >
                <template
                    v-for="user in event.data.users.slice(0, 4)"
                    :key="user.id"
                >
                    <UserCard :user="user" />
                </template>
            </div>
            <Empty class="col-span-full" v-else :message="$t('no-attendees')" />
        </section>
        <!-- event photos -->
        <section class="space-y-4">
            <div class="flex items-center justify-between gap-2">
                <h3 class="title-2xl">
                    {{
                        $t("event-photos-count", {
                            count: event.data.media.length.toString(),
                        })
                    }}
                </h3>
                <Button
                    :label="$t('view-all')"
                    :href="
                        route('events.details', [event.data, { tab: 'photos' }])
                    "
                    variant="link"
                />
            </div>
            <div class="grid" v-if="event.data.images.length > 0">
                <Slider
                    :list="event.data.images"
                    v-slot="{ item }"
                    :options="{
                        breakpoints: {
                            987: { slidesPerView: 4 },
                        },
                    }"
                >
                    <div class="overflow-hidden rounded-2xl blur-sm">
                        <img
                            :src="item.original_url"
                            class="object-cover w-full aspect-square"
                        />
                    </div>
                </Slider>
            </div>

            <Empty
                class="col-span-full"
                v-else
                :message="$t('no-photos')"
            /></section
    ></EventShowLayout>
</template>

<style scoped></style>
