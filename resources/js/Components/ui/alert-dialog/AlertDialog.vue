<script setup lang="ts">
const emit = defineEmits<{
    (e: "confirm", close: () => void): void;
    (e: "cancel"): void;
}>();
const props = withDefaults(
    defineProps<{
        title?: string;
        description?: string;
        name?: string;
        cancelLabel?: string;
        confirmLabel?: string;
        theme?: "warning" | "danger";
        loading?: boolean;
        autoCloseOnConfirm?: boolean;
        alignContent?: "start" | "center";
    }>(),
    {
        title: () => trans("confirm-action"),
        description: () => trans("are-you-sure"),
        cancelLabel: () => trans("cancel"),
        confirmLabel: () => trans("confirm"),
        theme: "default",
        autoCloseOnConfirm: true,
        alignContent: "center",
    }
);

const open = ref(false);
const close = () => {
    open.value = false;
};
const confirm = async () => {
    emit("confirm", close);
    if (props.autoCloseOnConfirm) {
        close();
    }
};
const cancel = () => {
    close();
    emit("cancel");
};

const themeConfig = computed(() => {
    const themes = {
        default: {
            icon: "text-primary i-heroicons-exclamation-circle",
            buttonVariant: "default",
        },
        warning: {
            icon: "text-amber-400 i-heroicons-exclamation-circle",
            buttonVariant: "warning",
        },
        danger: {
            icon: "text-red-500 i-radix-icons-exclamation-triangle",
            buttonVariant: "destructive",
        },
    };
    return themes[props.theme];
});
const alignContentStyles = computed(() => {
    const styles = {
        center: {
            title: "justify-center",
            description: "text-center",
            footer: "*:grow sm:justify-stretch",
            header: "justify-center",
        },
        start: {
            title: "",
            description: "",
            footer: "",
            header: "",
            content: "",
        },
    };
    return styles[props.alignContent];
});

defineOptions({ inheritAttrs: false });
</script>

<template>
    <AlertDialogRoot v-model:open="open">
        <AlertDialogTrigger as-child :loading>
            <slot />
        </AlertDialogTrigger>
        <AlertDialogContent>
            <AlertDialogHeader :class="[alignContentStyles.header]">
                <AlertDialogCancel @click="cancel" as-child>
                    <Button
                        variant="ghost"
                        class="absolute top-2 end-2"
                        size="icon-sm"
                        icon="i-radix-icons-cross-1"
                    />
                </AlertDialogCancel>
                <div
                    v-if="title"
                    :class="
                        cn('flex items-center gap-2', alignContentStyles.title)
                    "
                >
                    <span :class="['size-8 shrink-0', themeConfig.icon]" />
                    <AlertDialogTitle>{{ title }}</AlertDialogTitle>
                </div>
                <AlertDialogDescription :class="alignContentStyles.description">
                    {{ description }}
                    <span
                        v-if="props.name"
                        class="ms-0.5 font-semibold text-primary first-letter:capitalize"
                        >{{ name }}
                    </span>
                </AlertDialogDescription>
            </AlertDialogHeader>
            <AlertDialogFooter :class="alignContentStyles.footer">
                <Button
                    :loading
                    @click.prevent="confirm"
                    :variant="themeConfig.buttonVariant"
                    :label="confirmLabel"
                />
            </AlertDialogFooter>
        </AlertDialogContent>
    </AlertDialogRoot>
</template>

<style></style>
