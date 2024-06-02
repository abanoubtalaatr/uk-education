<script setup>
const props = defineProps({
    step: Number,
});

const digit1 = ref("");
const digit2 = ref("");
const digit3 = ref("");
const digit4 = ref("");

const form = useForm({
    code: "",
});

const handleInput = (event) => {
    const inputType = event.inputType;
    let currentActiveElement = event.target;

    if (inputType === "insertText") {
        currentActiveElement.nextElementSibling?.focus();
    }
};

const onPaste = (event) => {
    const dataFromPaste = event.clipboardData?.getData("text").trim().split("");

    digit1.value = dataFromPaste[0];
    digit2.value = dataFromPaste[1];
    digit3.value = dataFromPaste[2];
    digit4.value = dataFromPaste[3];
};

const handleDelete = (event) => {
    let value = event.target.value;
    let currentActiveElement = event.target;
    if (!value) {
        currentActiveElement.previousElementSibling?.focus();
    }
};

const submit = () => {
    form.code = digit1.value + digit2.value + digit3.value + digit4.value;
    form.post(route("phone-verification.store"));
};
//TODO add resend email notification
</script>

<template>
    <OnBoardingLayout
        image-src="/images/phone_verification.webp"
        :title="$t('verify-your-phone-number')"
        :subtitle="
            $t('enter-otp-sent-to-otp-via-sms', {
                otp: $page.props.auth.user.phone,
            })
        "
        :step="step"
    >
        <Form @submit="submit">
            <div>
                <div class="flex justify-around mt-5">
                    <div class="flex gap-5">
                        <input
                            class="w-20 h-20 text-3xl text-center border border-gray-400 rounded-xl"
                            maxlength="1"
                            v-model="digit1"
                            @input="handleInput"
                            @keydown.delete="handleDelete"
                            @paste="onPaste"
                        />
                        <input
                            class="w-20 h-20 text-3xl text-center border border-gray-400 rounded-xl"
                            maxlength="1"
                            v-model="digit2"
                            @input="handleInput"
                            @keydown.delete="handleDelete"
                            @paste="onPaste"
                        />
                        <input
                            class="w-20 h-20 text-3xl text-center border border-gray-400 rounded-xl"
                            maxlength="1"
                            v-model="digit3"
                            @input="handleInput"
                            @keydown.delete="handleDelete"
                            @paste="onPaste"
                        />
                        <input
                            class="w-20 h-20 text-3xl text-center border border-gray-400 rounded-xl"
                            maxlength="1"
                            v-model="digit4"
                            @input="handleInput"
                            @keydown.delete="handleDelete"
                            @paste="onPaste"
                        />
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <FieldError
                        v-if="form.errors.code"
                        :error="form.errors.code"
                    />
                </div>
            </div>

            <Button
                type="submit"
                :loading="form.processing"
                :label="$t('next')"
            />
        </Form>
    </OnBoardingLayout>
</template>

<style scoped></style>
