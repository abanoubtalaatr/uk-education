<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

defineProps({
    status: String,
});

const form = useForm({
    email: "",
});

const submit = () => {
    form.post(route("password.email"));
};
</script>

<template>
    <Head title="Forgot Password" />

    <AuthenticationCard>
        <h2 class="auth-title">{{ $t("forget-your-password") }}</h2>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <Form @submit="submit">
            <FormField :label="$t('email')" :error="form.errors.email">
                <Input
                    v-model="form.email"
                    type="email"
                    has-focus
                    autocomplete="email"
                />
            </FormField>

            <Button type="submit" :loading="form.processing">
                {{ $t("verify") }}
            </Button>
            <div class="flex gap-2 items-center -mt-6 mx-auto">
                <span class="font-medium text-primary-600">{{
                    $t("dont-have-an-account")
                }}</span>
                <Button
                    variant="link"
                    :href="route('register')"
                    :label="$t('sign-up')"
                />
            </div>
        </Form>
    </AuthenticationCard>
</template>
