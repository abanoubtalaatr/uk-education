<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";
import { watch } from "vue";

declare module "@inertiajs/core" {
    interface PageProps {
        brands: Resource<Brands>;
    }
}
const props = defineProps<{
    cities: Resource<Cities>;
    user: Resource<User>;
    types: Array<Object>;
}>();
const myBikesForm = useForm({
    show_my_bikes: props.user.data.show_my_bikes,
});

const dreamBikesForm = useForm({
    show_dream_bikes: props.user.data.show_dream_bikes,
});

watch(
    () => myBikesForm.show_my_bikes,
    () => {
        myBikesForm.put(route("settings.show-my-bike"));
    }
);

watch(
    () => dreamBikesForm.show_dream_bikes,
    () => {
        dreamBikesForm.put(route("settings.show-dream-bike"));
    }
);
</script>

<template>
    <ProfileLayout>
        <Head :title="$t('account-settings')" />
        <ProfileUpdateInformationForm :user="user.data" :cities="cities" />
        <ProfileEventSection />
        <ProfileBikeSection
            :bikes="user.data.owned_bikes"
            :types="types.data"
        />
        <section class="flex justify-between gap-3 max-md:flex-col">
            <div>
                <h2 class="card-title">
                    {{ $t("show-your-motor-bikes") }}
                </h2>
                <p class="card-description ms-auto">
                    {{
                        $t(
                            "showcase-your-motorcycle-collection-for-public-viewing"
                        )
                    }}
                </p>
            </div>
            <Switch v-model:checked="myBikesForm.show_my_bikes" />
        </section>
        <ProfileDreamBikeSection
            :bike="{
                brand: user.data?.dream_bike_brand,
                id: 0,
                model: user.data?.model,
                vehicle_type: user.data?.dream_bike_type,
            }"
            :types="types.data"
        />
        <section class="flex justify-between gap-3 max-md:flex-col">
            <div>
                <h2 class="card-title">
                    {{ $t("show-your-dream-motor-bike") }}
                </h2>
                <p class="card-description ms-auto">
                    {{ $t("showcase-your-dream-bike-for-public-viewing") }}
                </p>
            </div>
            <Switch v-model:checked="dreamBikesForm.show_dream_bikes" />
        </section>
    </ProfileLayout>
</template>

<style scoped></style>
