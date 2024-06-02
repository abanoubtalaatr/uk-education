<script setup>
import OnBoardingLayout from "@/Layouts/OnBoardingLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";

const props = defineProps({
    step: Number,
    interests: Array,
});

const interests = ref(props.interests.data);
const selectedInterests = ref([]);

const form = useForm({
    interests: [],
});

const addInterest = (index, interest) => {
    interests.value.splice(index, 1);
    selectedInterests.value.push(interest);
};

const removeInterest = (index, interest) => {
    selectedInterests.value.splice(index, 1);
    interests.value.push(interest);
};

const submit = () => {
    form.interests = selectedInterests.value.map((item) => item.id);
    form.post(route("interests.store"));
};
</script>

<template>
    <Head title="On boarding personal information" />

    <OnBoardingLayout
        image-src="/images/personal_information.webp"
        :title="$t('tell_interests')"
        :subtitle="$t('find_perfect_interests')"
        :step="step"
    >
        <div class="">
            <Form @submit="submit">
                <div class="flex flex-wrap gap-2 overflow-y-auto max-h-60">
                    <div
                        v-for="(interest, index) in selectedInterests"
                        class="flex items-center gap-2 p-2 text-sm border rounded-full cursor-pointer hover:bg-gray-100"
                    >
                        <span>{{ interest.name }}</span>
                        <span
                            class="cursor-pointer i-radix-icons-cross-1"
                            @click="removeInterest(index, interest)"
                        ></span>
                    </div>
                </div>

                <hr />

                <div class="flex flex-wrap gap-2 overflow-y-auto max-h-60">
                    <div
                        v-for="(interest, index) in interests"
                        class="flex items-center gap-2 p-2 text-sm border rounded-full cursor-pointer hover:bg-gray-100"
                        @click="addInterest(index, interest)"
                    >
                        <span>{{ interest.name }}</span>
                        <span class="cursor-pointer i-radix-icons-plus"></span>
                    </div>
                </div>

                <Button
                    type="submit"
                    :loading="form.processing"
                    :label="$t('finish')"
                />

                <button type="submit" class="underline">
                    {{ $t("skip") }}
                </button>
            </Form>
        </div>
    </OnBoardingLayout>
</template>

<style scoped></style>
