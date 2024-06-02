<script setup lang="ts">
import { v4 as uuid } from "uuid";

type Model = Bike;
const emit = defineEmits(["close"]);
const props = defineProps<{
    model?: Model;
    types: Array<Object>;
}>();

const page = usePage();
const brands = computed(() => page.props.brands?.data ?? []);

const showForm = defineModel<boolean>("open");

const formId = `${uuid()}-form`;

const form = useForm(() => ({
    model: props.model?.model ?? undefined,
    brand_id: props.model?.brand?.id ?? undefined,
    vehicle_type_id: props.model?.vehicle_type?.id ?? undefined,
}));

const submit = () => {
    form.put(route("settings.dream-bike"), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            showForm.value = false;
            form.reset();
        },
    });
};

const handleOpenUpdate = (open: boolean) => {
    if (!open) {
        emit("close");
        form.reset();
    }
};
</script>

<template>
    <Dialog
        v-model:open="showForm"
        @update:open="handleOpenUpdate"
        :title="$t('dream-bike')"
    >
        <template #trigger>
            <slot name="trigger">
                <Button
                    :label="$t('change-dream-bike')"
                    class="font-alegreya-sans-sc"
                />
            </slot>
        </template>
        <div class="">
            <div class="">
                <Form :id="formId" @submit="submit">
                    <FormField
                        :label="$t('brand')"
                        :error="form.errors.brand_id"
                    >
                        <Combobox
                            :options="brands"
                            option-value="id"
                            option-label="name"
                            v-model="form.brand_id"
                        />
                    </FormField>
                    <FormField :label="$t('model')" :error="form.errors.model">
                        <Input v-model="form.model" />
                    </FormField>
                    <FormField
                        :label="$t('type')"
                        :error="form.errors.vehicle_type_id"
                    >
                        <Combobox
                            :options="types"
                            option-value="id"
                            option-label="name"
                            v-model="form.vehicle_type_id"
                        />
                    </FormField>
                </Form>
            </div>
        </div>
        <template #footer>
            <Button
                :form="formId"
                type="submit"
                :label="$t('save')"
                :loading="form.processing"
            />
            <DialogClose />
        </template>
    </Dialog>
</template>

<style></style>
