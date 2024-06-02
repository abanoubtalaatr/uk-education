<script setup lang="ts">
const props = defineProps<{
    bike: Bike,
    types: Array<Object>
}>();
const detachBikeForm = useForm<{
    bike_id: number | null;
}>(() => ({
    bike_id: null,
}));
const detachBike = (bike: Bike) => {
    detachBikeForm.bike_id = bike.id;
    detachBikeForm.delete(route("bike.destroy", { id: bike.id }), {
        preserveScroll: true,
        preserveState: true,
    });
};
</script>
<template>
    <BikeForm :model="bike" :types="types">
        <template #trigger>
            <Button
                :label="$t('edit-bike')"
                class="font-alegreya-sans-sc"
                variant="outline"
            />
        </template>
    </BikeForm>
    <AlertDialog
        @confirm="detachBike(bike)"
        :loading="
            detachBikeForm.processing && bike.id === detachBikeForm.bike_id
        "
        :description="$t('are-you-sure-you-want-to-delete-this-bike')"
        :title="$t('confirm-action')"
        :confirm-label="$t('confirm')"
    >
        <Button :label="$t('remove')" variant="link" />
    </AlertDialog>
</template>
