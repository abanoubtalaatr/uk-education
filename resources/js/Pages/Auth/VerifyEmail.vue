<script setup>
const props = defineProps({
    status: String,
});

const form = useForm({});

const submit = () => {
    form.post(route("verification.send"));
};

const verificationLinkSent = computed(
    () => props.status === "verification-link-sent"
);
</script>

<template>
    <Head title="Email Verification" />

    <AuthenticationCard>
        <div class="mb-4 text-sm text-gray-600">
            {{
                $t(
                    "before-continuing-could-you-verify-your-email-address-by-clicking-on-the-link-we-just-emailed-to-you-if-you-didnt-receive-the-email-we-will-gladly-send-you-another"
                )
            }}
        </div>

        <div
            v-if="verificationLinkSent"
            class="mb-4 text-sm font-medium text-green-600"
        >
            {{
                $t(
                    "a-new-verification-link-has-been-sent-to-the-email-address-you-provided-in-your-profile-settings"
                )
            }}
        </div>

        <form @submit.prevent="submit">
            <div class="flex items-center justify-between mt-4">
                <Button type="submit" :loading="form.processing">
                    {{ $t("resend-verification-email") }}
                </Button>

                <div class="flex">
                    <Button
                        :href="route('logout')"
                        method="post"
                        variant="link"
                    >
                        {{ $t("log-out") }}
                    </Button>
                </div>
            </div>
        </form>
    </AuthenticationCard>
</template>
