<script setup>
const props = defineProps({
    step: Number,
});

const form = useForm({
    phone: undefined,
});

const submit = () => {
    form.post(route("phone.store"));
};
</script>

<template>
    <OnBoardingLayout
        image-src="/images/phone.webp"
        :title="$t('please-enter-your-phone-number')"
        :subtitle="$t('this-is-will-help-us-find-the-perfect-event-for-you')"
        :step="step"
    >
        <Form @submit="submit">
            <FormField :label="$t('phone-number')" :error="form.errors.phone">
                <Input v-model="form.phone" has-focus />
            </FormField>

            <Button
                type="submit"
                :loading="form.processing"
                :label="$t('next')"
            />
        </Form>
    </OnBoardingLayout>
</template>

<style scoped></style>
