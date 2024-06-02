<script setup lang="ts">
import { TabsIndicator } from "radix-vue";
import UserAttendanceCard from "@/Components/User/UserAttendanceCard.vue";

const props = defineProps<{
    event: Resource<TEvent>;
    attending: boolean;
    attended: boolean;
}>();
const eventTabs = computed(() => [
    {
        label: trans("attendees", {
            count: props.event.data.users.length.toString(),
        }),
        value: "attendees",
    },
    {
        label: trans("photos", {
            count: props.event.data.media.length.toString(),
        }),
        value: "photos",
    },
]);
const activeTab = ref<"attendees" | "photos">(
    route().params?.tab ?? "attendees"
);
watch(activeTab, (tab) => {
    router.get("", { tab });
});
</script>

<template>
    <EventShowLayout :event="event" :attended="attended">
        <Link
            :href="route('events.show', [event.data])"
            class="flex items-center gap-2"
        >
            <div class="i-heroicons-arrow-left" />
            <div>{{ $t("back") }}</div>
        </Link>
        <Tabs v-model="activeTab">
            <TabsList>
                <template v-for="tab in eventTabs" :key="tab.value">
                    <TabsTrigger :value="tab.value">{{
                        tab.label
                    }}</TabsTrigger>
                </template>
            </TabsList>
            <!-- attendees tab content -->
            <TabsContent class="mt-6 space-y-6" value="attendees">
                <AppSearchInput class="max-w-sm ms-auto" />
                <template v-for="user in event.data.users" :key="user.id">
                    <UserAttendanceCard :user="user" :event="event.data" />
                </template>
            </TabsContent>
            <!-- photos tab content -->
            <TabsContent class="mt-6 space-y-6" value="photos">
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                    <template v-for="media in event.data.media" :key="media.id">
                        <div class="overflow-hidden rounded-2xl">
                            <img
                                :src="media.original_url"
                                class="object-cover w-full aspect-square"
                            />
                        </div>
                    </template>
                </div>
            </TabsContent>
        </Tabs>
    </EventShowLayout>
</template>

<style scoped></style>
