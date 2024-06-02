<script setup>
defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Log in" />

    <AuthenticationCard>
        <h2 class="auth-title">{{ $t("login") }}</h2>
        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
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
            <FormField :label="$t('password')" :error="form.errors.password">
                <PasswordInput
                    v-model="form.password"
                    autocomplete="current-password"
                />
            </FormField>
            <div class="flex items-center justify-between">
                <Checkbox
                    :label="$t('remember-me')"
                    v-model="form.remember"
                    name="remember"
                />
                <Button
                    variant="link"
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    :label="$t('forgot-your-password')"
                />
            </div>
            <Button label="Log In" :loading="form.processing" type="submit" />
            <div class="flex items-center gap-2 mx-auto -mt-6">
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
