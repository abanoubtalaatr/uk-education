<script setup lang="ts">
const props = defineProps<{
    user: Resource<User>;
    events: Resource<Events>;
}>();
const userExtraInfo = computed(() => [
    {
        icon: "i-radix-icons-calendar",
        value: formatDate(props.user.data.birth_date, "DD MMM,YYYY"),
    },
    {
        icon: "i-heroicons-map-pin",
        value: props.user.data.city?.name,
    },
    {
        icon: "i-heroicons-phone",
        value: props.user.data.phone,
    },
]);
const page = usePage();
const isCurrentUser = computed(
    () => props.user.data.id === page.props.auth.user.id
);
</script>

<template>
    <AppLayout>
        <Head :title="$t('attendee')" />
        <div class="grid lg:grid-cols-[24rem_1fr] gap-6 relative container">
            <div class="space-y-6">
                <!-- user card -->
                <section
                    class="grid items-end p-4 bg-center bg-no-repeat bg-cover rounded-2xl min-h-96"
                    :style="`background-image: url(${
                        user.data.profile_photo_url !== ''
                            ? user.data.profile_photo_url
                            : getImgPlaceholder(user.data.name)
                    })`"
                >
                    <div class="p-4 border border-white bg-white/60 rounded-xl">
                        <h2
                            class="font-sans font-medium capitalize title-2xl text-primary"
                        >
                            {{ user.data.name }}
                        </h2>
                        <p class="text-sm font-medium text-primary-600">
                            {{
                                $t("joined-bikerz-on-date", {
                                    date: formatDate(
                                        user.data.created_at,
                                        "MMM,YYYY"
                                    ),
                                })
                            }}
                        </p>
                        <div class="mt-6 space-y-2">
                            <template
                                v-for="(extraInfo, index) in userExtraInfo"
                            >
                                <div
                                    class="flex items-center gap-2"
                                    v-if="extraInfo.value"
                                >
                                    <span
                                        :class="['size-4 ', extraInfo.icon]"
                                    />
                                    <span class="font-medium text-primary-950">
                                        {{ extraInfo.value }}
                                    </span>
                                </div>
                            </template>
                        </div>
                    </div>
                </section>
                <!-- interests -->
                <Card v-if="user.data.show_interests || isCurrentUser">
                    <CardHeader class="flex-col items-start">
                        <h2 class="text-xl font-semibold text-primary-950">
                            {{ $t("interests") }}
                        </h2>
                        <p class="text-sm text-primary-600">
                            {{
                                $t(
                                    "choose-a-region-to-set-how-dates-numbers-and-measurements-appear-on-your-site"
                                )
                            }}
                        </p>
                    </CardHeader>
                    <CardContent
                        class="flex flex-wrap gap-3 p-4"
                        v-if="user.data.interests.length"
                    >
                        <template
                            v-for="interest in user.data.interests"
                            :key="interest.id"
                        >
                            <Badge
                                variant="outline"
                                class="px-3 py-2"
                                :label="interest.name"
                            />
                        </template>
                    </CardContent>
                    <Empty v-else />
                </Card>
                <!-- show bikes attributes-->
                <Card v-if="user.data.show_my_bikes">
                    <CardHeader class="flex-col items-start">
                        <h2 class="text-xl font-semibold text-primary-950">
                            {{ $t("his-bikes") }}
                        </h2>
                        <p class="text-sm text-primary-600">
                            {{
                                $t("this-is-a-list-of-motor-bikes-that-he-have")
                            }}
                        </p>
                    </CardHeader>
                    <CardContent
                        class="flex flex-wrap gap-3 p-4"
                        v-if="user.data.owned_bikes.length"
                    >
                        <template v-for="bike in user.data.owned_bikes">
                            <div
                                class="flex items-center p-2 rounded-full max-h-48 max-w-48"
                            >
                                <img
                                    :src="
                                        bike.brand.image ??
                                        getImgPlaceholder(bike.brand?.id)
                                    "
                                    class="object-cover w-full"
                                />
                            </div>
                        </template>
                    </CardContent>
                    <Empty v-if="user.data.owned_bikes.length === 0" />
                </Card>
                <!-- show dream bike attributes -->
                <Card v-if="user.data.show_dream_bikes">
                    <CardHeader class="flex-col items-start">
                        <h2 class="text-xl font-semibold text-primary-950">
                            {{ $t("his-dream-bikes") }}
                        </h2>
                        <p class="text-sm text-primary-600">
                            {{
                                $t(
                                    "this-is-a-list-of-motor-bikes-that-he-dreams-of"
                                )
                            }}
                        </p>
                    </CardHeader>
                    <CardContent
                        class="flex flex-wrap gap-3 p-4"
                        v-if="user.data.dream_bike_brand && user.data.model"
                    >
                        <div
                            class="flex items-center p-2 rounded-full max-h-48 max-w-48"
                        >
                            <img
                                :src="
                                    user.data.dream_bike_brand.image ??
                                    getImgPlaceholder(
                                        user.data.dream_bike_brand?.id
                                    )
                                "
                                class="object-cover w-full"
                            />
                        </div>
                    </CardContent>
                    <Empty v-if="user.data.owned_bikes.length === 0" />
                </Card>
            </div>
            <div class="space-y-6">
                <div
                    :class="[
                        'p-6 bg-black rounded-2xl relative space-y-9',
                        'after:absolute after:top-20 after:start-0 after:h-0.5 after:max-w-sm after:w-full after:bg-white',
                    ]"
                >
                    <ApplicationLogo class="text-white" />
                    <div class="ps-8">
                        <h1
                            class="text-3xl font-medium text-white font-alegreya-sans-sc"
                        >
                            {{
                                $t("get-to-know-user", { user: user.data.name })
                            }}
                        </h1>
                        <p class="text-sm text-white">
                            {{
                                $t("see-what-you-and-user-share-in-common", {
                                    user: user.data.name,
                                })
                            }}
                        </p>
                    </div>
                </div>
                <!-- events -->
                <Card>
                    <CardHeader class="flex-col items-start">
                        <h2 class="text-xl font-semibold text-primary-950">
                            {{ $t("shared-events") }}
                        </h2>
                        <p class="text-sm text-primary-600">
                            {{
                                $t(
                                    "choose-a-region-to-set-how-dates-numbers-and-measurements-appear-on-your-site-0"
                                )
                            }}
                        </p>
                    </CardHeader>
                    <CardContent class="p-4 space-y-4">
                        <template v-if="events.data.length">
                            <template v-for="event in events.data">
                                <MyEventsLongCard
                                    :event="event"
                                    showCancelAttendButton
                                />
                            </template>
                        </template>
                        <Empty v-else />
                    </CardContent>
                </Card>
            </div>
        </div>
    </AppLayout>
</template>
