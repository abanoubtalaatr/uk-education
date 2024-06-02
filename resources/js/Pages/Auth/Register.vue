<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Register" />

    <AuthenticationCard>
        <h2 class="auth-title">{{ $t("sign-up") }}</h2>
        <Form @submit="submit">
            <FormField :label="$t('name')" :error="form.errors.name">
                <Input v-model="form.name" autocomplete="name" has-focus />
            </FormField>

            <FormField :label="$t('email')" :error="form.errors.email">
                <Input type="email" v-model="form.email" autocomplete="email" />
            </FormField>

            <FormField :label="$t('password')" :error="form.errors.password">
                <PasswordInput
                    v-model="form.password"
                    autocomplete="new-password"
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

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                <div>
                    <Checkbox
                        id="terms"
                        v-model="form.terms"
                        name="terms"
                        required
                        class="text-sm"
                    >
                        <div>
                            {{ $t("by-creating-an-account-i-agree-to-bikerz") }}

                            <Button
                                variant="link"
                                target="_blank"
                                as="a"
                                :href="route('terms.show')"
                                :label="$t('terms-of-use')"
                                class="p"
                            />
                            {{ $t("and") }}
                            <Button
                                variant="link"
                                as="a"
                                target="_blank"
                                :href="route('policy.show')"
                                :label="$t('privacy-policy')"
                            />
                        </div>
                    </Checkbox>

                    <InputError class="mt-2" :message="form.errors.terms" />
                </div>
            </div>

            <Button
                :label="$t('register')"
                type="submit"
                :loading="form.processing"
            />

            <div class="flex items-center gap-2 mx-auto -mt-6">
                <span class="font-medium text-primary-600">{{
                    $t("already-have-an-account")
                }}</span>
                <Button
                    variant="link"
                    :href="route('login')"
                    :label="$t('sign-up')"
                />
            </div>
        </Form>
    </AuthenticationCard>
</template>
