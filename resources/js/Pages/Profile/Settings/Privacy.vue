<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";
import Checkbox from "@/Components/Checkbox.vue";

const props = defineProps({
    user: {
        required: true,
        type: Object,
    },
});

const form = useForm({
    show_personal_information: Boolean(
        props.user.data.show_personal_information
    ),
    show_event_attendance: Boolean(props.user.data.show_event_attendance),
});

const privacyToggle = ref(
    form.show_personal_information || form.show_event_attendance
);

watch(privacyToggle, async (newValue) => {
    if (newValue === false) {
        form.show_event_attendance = false;
        form.show_personal_information = false;
    }
});

const submit = () => {
    form.put(route("settings.privacy.update"));
};
</script>

<template>
    <ProfileLayout :header="$t('privacy-settings')">
        <Head :title="$t('privacy-settings')" />

        <Card>
            <CardHeader class="">
                <div>
                    <h2 class="card-title">{{ $t("privacy-settings") }}</h2>
                    <p class="card-description">
                        {{ $t("brief-description-about-privacy-settings") }}
                    </p>
                </div>
                <div>
                    <Switch v-model:checked="privacyToggle" />
                </div>
            </CardHeader>

            <CardContent>
                <Form @submit="submit" class="gap-2">
                    <div class="">
                        <template v-if="privacyToggle">
                            <div class="flex flex-col gap-2">
                                <Checkbox
                                    id="show_personal_information"
                                    v-model="form.show_personal_information"
                                    name="show_personal_information"
                                    class="text-sm"
                                    :label="$t('show-personal-information')"
                                >
                                </Checkbox>
                                <Checkbox
                                    id="show_event_attendance"
                                    v-model="form.show_event_attendance"
                                    name="show_event_attendance"
                                    class="text-sm"
                                    :label="$t('show-attendance-on-events')"
                                >
                                </Checkbox>
                            </div>
                        </template>
                    </div>

                    <div class="flex justify-end mt-5">
                        <Button
                            type="submit"
                            :loading="form.processing"
                            :label="$t('save')"
                        />
                    </div>
                </Form>
            </CardContent>
        </Card>
    </ProfileLayout>
</template>

<style scoped></style>
