<script setup lang="ts">
import { RadioGroupItem } from "radix-vue";
import Checkbox from "@/Components/Checkbox.vue";
const props = defineProps<{
    step: Number;
    cities: Resource<Cities>;
    brands: Resource<Brands>;
    types: Resource<Types>;
}>();

const form = useForm({
    job_title: undefined,
    city: undefined,
    birth_date: undefined,
    have_motor_bike: false,
    three_habit_certificate: false,
    model: undefined,
    brand_id: undefined,
    vehicle_type_id: undefined,
    gender: undefined,
    bike_photo: undefined,
});

const genders = computed(() => {
    return [
        {
            value: "male",
            label: trans("male"),
            image: "/images/male_avatar.webp",
        },
        {
            value: "female",
            label: trans("female"),
            image: "/images/female_avatar.webp",
        },
    ];
});

const submit = () => {
    form.post(route("personal-info.store"));
};
</script>

<template>
    <Head title="On boarding personal information" />

    <OnBoardingLayout
        image-src="/images/personal_information.webp"
        :title="$t('tell-us-more-about-your-self')"
        :subtitle="$t('this-will-help-us-recommend-events-for-you')"
        :step="step"
    >
        <div>
            <Form @submit="submit">
                <FormField
                    :label="$t('job-title')"
                    :error="form.errors.job_title"
                >
                    <Input v-model="form.job_title" has-focus />
                </FormField>
                <FormField :label="$t('city')" :error="form.errors.city">
                    <Combobox
                        v-model="form.city"
                        :options="cities.data"
                        option-label="name"
                        option-value="id"
                    />
                </FormField>
                <FormField
                    :label="$t('date-of-birth')"
                    :error="form.errors.birth_date"
                >
                    <DateInput v-model="form.birth_date" />
                </FormField>
                <FormField :label="$t('gender')" :error="form.errors.gender">
                    <RadioGroup
                        class="grid w-full grid-cols-2"
                        v-model="form.gender"
                    >
                        <template v-for="gender in genders" :key="gender.value">
                            <RadioGroupItem
                                :value="gender.value"
                                :label="gender.label"
                                :class="[
                                    'flex items-center gap-2 p-6 border justify-center rounded-lg data-[state=checked]:border-input data-[state=checked]:bg-primary-50 ',
                                ]"
                            >
                                <label>{{ gender.label }}</label>
                                <img :src="gender.image" />
                            </RadioGroupItem>
                        </template>
                    </RadioGroup>
                </FormField>
                <Checkbox
                    v-model="form.have_motor_bike"
                    :label="$t('do-you-have-a-motor-bike')"
                />
                <template v-if="form.have_motor_bike">
                    <FormField
                        :label="$t('bike-image')"
                        :error="form.errors.bike_photo"
                    >
                        <Upload v-model="form.bike_photo" />
                    </FormField>
                    <FormField
                        :label="$t('bike-brand')"
                        :error="form.errors.brand_id"
                    >
                        <Combobox
                            :options="brands.data"
                            v-model="form.brand_id"
                            option-label="name"
                            option-value="id"
                        />
                    </FormField>
                    <div class="grid gap-5 lg:grid-cols-2">
                        <FormField
                            :label="$t('model')"
                            :error="form.errors.model"
                        >
                            <Input v-model="form.model" />
                        </FormField>
                        <FormField
                            :label="$t('type')"
                            :error="form.errors.vehicle_type_id"
                        >
                            <Combobox
                                :options="types.data"
                                v-model="form.vehicle_type_id"
                                option-label="name"
                                option-value="id"
                            />
                        </FormField>
                    </div>

                    <Checkbox
                        id="three_habit_certificate"
                        v-model="form.three_habit_certificate"
                        name="three_habit_certificate"
                        class="text-sm"
                    >
                        <div>
                            {{ $t("do-you-have-three-habit-certificate") }}
                        </div>
                    </Checkbox>
                </template>
                <Button
                    type="submit"
                    :loading="form.processing"
                    :label="$t('next')"
                />
            </Form>
        </div>
    </OnBoardingLayout>
</template>
