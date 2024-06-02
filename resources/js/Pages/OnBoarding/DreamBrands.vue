<script setup>
import { watch } from "vue";

const props = defineProps({
    step: Number,
    featured_brands: Array,
    other_brands: Array,
    types: Array
});

const form = useForm({
    brand_id: undefined,
    model: undefined,
    vehicle_type_id: undefined,
});

const selectBrand = (id) => {
    form.brand_id = id;
};

const models = computed(() => {
    let brand = props.featured_brands.data.find(
        (brand) => brand.id === form.brand_id
    );
    if (!brand) {
        brand = props.other_brands.data.find(
            (brand) => brand.id === form.brand_id
        );
    }
    return brand.models;
});

const submit = () => {
    form.post(route("user-brands.store"));
};
</script>

<template>
    <OnBoardingLayout
        image-src="/images/brands.webp"
        :title="$t('choose-your-dream-bike')"
        :subtitle="$t('this-is-will-help-us-find-the-perfect-event-for-you')"
        :step="step"
    >
        <Form @submit="submit">
            <div class="grid grid-cols-5 gap-5">
                <Brand
                    v-for="brand in props.featured_brands.data"
                    :brand="brand"
                    :selected="form.brand_id === brand.id"
                    @click="selectBrand(brand.id)"
                />
            </div>
            <FormField
                :label="$t('other-brands')"
                :error="form.errors.brand_id"
            >
                <Combobox
                    :options="props.other_brands.data"
                    v-model="form.brand_id"
                    option-label="name"
                    option-value="id"
                />
            </FormField>
            <div class="grid gap-5 lg:grid-cols-2">
                <FormField
                    :label="$t('bike-model')"
                    :error="form.errors.model"
                >
                    <Input v-model="form.model" />
                </FormField>
                <FormField :label="$t('type')" :error="form.errors.vehicle_type_id">
                    <Combobox
                        :options="types.data"
                        v-model="form.vehicle_type_id"
                        option-label="name"
                        option-value="id"
                    />
                </FormField>
            </div>

            <Button
                type="submit"
                :loading="form.processing"
                :label="$t('next')"
            />

            <button type="submit" class="underline">
                {{ $t("skip") }}
            </button>
        </Form>
    </OnBoardingLayout>
</template>

<style scoped></style>
