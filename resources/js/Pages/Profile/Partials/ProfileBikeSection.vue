<script setup lang="ts">
const props = defineProps<{
    bikes: Bikes,
    types: Array<Object>
}>();
</script>
<template>
    <Card>
        <CardHeader class="justify-between">
            <div>
                <h2 class="card-title">
                    {{ $t("my-motor-bikes") }}
                </h2>
                <p class="card-description">
                    {{
                        $t(
                            "choose-a-region-to-set-how-dates-numbers-and-measurements-appear-on-your-site"
                        )
                    }}
                </p>
            </div>
            <BikeForm :types="types"/>
        </CardHeader>

        <CardContent>
            <section class="divide-y divide-primary-200" v-if="bikes.length">
                <template v-for="bike in bikes" :key="bike.id">
                    <BikeCard :bike="bike">
                        <template #actions>
                            <BikeActions :bike="bike" :types="types" />
                        </template>
                    </BikeCard>
                </template>
            </section>
            <Empty v-if="bikes.length === 0" />
        </CardContent>
    </Card>
</template>
