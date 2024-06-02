<script setup lang="ts">
const props = defineProps<{
    bike: Bike,
    types: Array<Object>
}>();
</script>
<template>
    <Card>
        <CardHeader class="justify-between">
            <div>
                <h2 class="card-title">
                    {{ $t("dream-bike") }}
                </h2>
                <p class="card-description">
                    {{
                        $t(
                            "choose-a-region-to-set-how-dates-numbers-and-measurements-appear-on-your-site"
                        )
                    }}
                </p>
            </div>
            <BikeDreamActions :types="types" />
        </CardHeader>
        <CardContent>
            <section class="divide-y divide-primary-200">
                <BikeCard :bike="bike" v-if="bike">
                    <template #actions>
                        <BikeDreamActions :model="bike" :types="types">
                            <template #trigger>
                                <Button
                                    variant="link"
                                    :label="$t('edit-bike')"
                                />
                            </template>
                        </BikeDreamActions>
                    </template>
                </BikeCard>
                <Empty v-else />
            </section>
        </CardContent>
    </Card>
</template>
