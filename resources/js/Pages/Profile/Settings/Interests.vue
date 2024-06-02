<script setup>
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    interests: Array,
    user: Object,
});

const interests = ref(props.interests.data);
const selectedInterests = ref(props.user.data.interests);

const form = useForm({
    interests: [],
    show_interests: props.user.data.show_interests,
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
    form.put(route("settings.interests.update"));
};
</script>

<template>
    <ProfileLayout :header="$t('interests')">
        <Head :title="$t('interests')" />
        <div class="">
            <Form @submit="submit">
                <Card>
                    <CardHeader class="justify-between">
                        <h2 class="card-title">
                            {{ $t("your-interests") }}
                        </h2>
                    </CardHeader>
                    <CardContent>
                        <div class="flex flex-wrap gap-2 mt-3">
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
                    </CardContent>
                </Card>

                <Card>
                    <CardHeader>
                        <h2 class="card-title">
                            {{ $t("interests") }}
                        </h2>
                    </CardHeader>

                    <CardContent>
                        <div class="flex flex-wrap gap-2 mt-3">
                            <div
                                v-for="(interest, index) in interests"
                                class="flex items-center gap-2 p-2 text-sm border rounded-full cursor-pointer hover:bg-gray-100"
                                @click="addInterest(index, interest)"
                            >
                                <span>{{ interest.name }}</span>
                                <span
                                    class="cursor-pointer i-radix-icons-plus"
                                ></span>
                            </div>
                        </div>
                    </CardContent>
                </Card>

                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="card-title">
                            {{ $t("show-interests") }}
                        </h2>
                        <p class="card-description">
                            {{
                                $t(
                                    "show-interests-in-your-profile-for-other-users"
                                )
                            }}
                        </p>
                    </div>
                    <Switch v-model:checked="form.show_interests" />
                </div>

                <div class="flex justify-end mt-5">
                    <Button
                        type="submit"
                        :loading="form.processing"
                        :label="$t('save')"
                    />
                </div>
            </Form>
        </div>
    </ProfileLayout>
</template>

<style scoped></style>
