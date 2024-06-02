<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    email: String,
    token: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("password.update"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Reset Password" />

    <AuthenticationCard>
        <h2 class="auth-title">{{ $t("reset-your-password") }}</h2>

        <Form @submit="submit">
            <FormField :label="$t('email')" :error="form.errors.email">
                <Input
                    v-model="form.email"
                    type="email"
                    has-focus
                    autocomplete="email"
                    disabled
                />
            </FormField>
            <FormField :label="$t('password')" :error="form.errors.password">
                <PasswordInput
                    v-model="form.password"
                    autocomplete="current-password"
                />
            </FormField>
            <FormField
                :label="$t('confirm-password')"
                :error="form.errors.password_confirmation"
            >
                <PasswordInput
                    v-model="form.password_confirmation"
                    autocomplete="new-password"
                />
            </FormField>
            <Button type="submit" :loading="form.processing">
                {{ $t("submit") }}
            </Button>
        </Form>
    </AuthenticationCard>
</template>
