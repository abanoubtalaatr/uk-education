<script setup lang="ts">
import { v4 as uuid } from "uuid";
const props = defineProps<{
    cities: Resource<Cities>;
    user: User;
}>();
const formId = `form-${uuid()}`;
const form = useForm(() => ({
    
    name: props.user?.name,
    city_id: props.user.city_id,
    phone: props.user?.phone,
    birth_date: props.user.birth_date,
    job_title: props.user?.job_title,
    profile_picture: null,
    profile_picture_removed: false,
}));
const submit = () => {
    form.post(route("settings.account.update"), {
        preserveScroll: true,
        preserveState: true,
        errorBag: "updateProfileInformation",
        onSuccess: () => {
            form.reset();
        },
    });
};

const previewPhoto = ref<string | null>(props.user.profile_photo_url);

const deletePhoto = () => {
    form.profile_picture_removed = true;
    previewPhoto.value = null;
};
const handlePhotoChange = (file, raw) => {
    form.profile_picture = file;
    previewPhoto.value = raw.url;
};
</script>

<template>
    <section class="space-y-6">
        <h2 class="title-2xl">{{ $t("account-settings") }}</h2>
        <Card>
            <CardContent>
                <Form
                    :id="formId"
                    @submit="submit"
                    class="grid md:grid-cols-[1fr,15rem] gap-6"
                >
                    <div class="space-y-4 max-md:order-2">
                        <FormField
                            :label="$t('name')"
                            :error="form.errors.name"
                        >
                            <Input
                                v-model="form.name"
                                autocomplete="name"
                                has-focus
                            />
                        </FormField>
                        <FormField
                            :label="$t('city')"
                            :error="form.errors.city_id"
                        >
                            <Combobox
                                v-model="form.city_id"
                                :options="cities.data"
                                option-value="id"
                                option-label="name"
                            />
                        </FormField>
                        <div class="grid grid-cols-2 gap-6">
                            <FormField
                                :label="$t('job-title')"
                                :error="form.errors.job_title"
                            >
                                <Input
                                    v-model="form.job_title"
                                    autocomplete="work"
                                />
                            </FormField>
                            <FormField
                                :label="$t('birth-date')"
                                :error="form.errors.birth_date"
                            >
                                <DatePicker v-model="form.birth_date" />
                            </FormField>
                        </div>
                        <FormField
                            :label="$t('phone')"
                            :error="form.errors.phone"
                        >
                            <Input v-model="form.phone" autocomplete="tel" />
                        </FormField>
                    </div>
                    <FormField
                        :label="$t('user-image')"
                        class="self-center w-fit justify-self-center max-md:order-1"
                    >
                        <div>
                            <FileInput
                                accept="image/*"
                                @input-update="handlePhotoChange"
                                class="relative"
                            >
                                <div class="w-48 overflow-hidden rounded-2xl">
                                    <img
                                        :src="
                                            previewPhoto ||
                                            getImgPlaceholder(user.name)
                                        "
                                        class="object-cover w-full"
                                    />
                                </div>
                            </FileInput>
                            <AlertDialog
                                v-if="previewPhoto"
                                @confirm="deletePhoto"
                                :disabled="
                                    form.processing &&
                                    form.profile_picture_removed
                                "
                                :title="$t('delete-photo')"
                                :description="
                                    $t(
                                        'are-you-sure-you-want-to-delete-your-image'
                                    )
                                "
                            >
                                <Button
                                    :label="$t('remove-image')"
                                    variant="outline"
                                    class="block mx-auto mt-6 font-alegreya-sans-sc w-fit"
                                />
                            </AlertDialog>
                        </div>
                    </FormField>
                </Form>
                <CardFooter>
                    <Button
                        :loading="form.processing"
                        type="submit"
                        :form="formId"
                        :label="$t('save')"
                    />
                </CardFooter>
            </CardContent>
        </Card>
    </section>
</template>
