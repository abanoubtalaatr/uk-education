<script setup lang="ts">
import {
    useForwardPropsEmits,
    type DialogRootEmits,
    type DialogRootProps,
} from "radix-vue";

defineOptions({ inheritAttrs: false });
const props = defineProps<
    DialogRootProps & {
        title: string;
        description?: string;
    }
>();
const emits = defineEmits<DialogRootEmits>();
const dialogProps = computed(() => {
    const { title, description, ...rest } = props;
    return rest;
});
const forwarded = useForwardPropsEmits(dialogProps, emits);
</script>

<template>
    <SheetRoot v-bind="forwarded">
        <SheetTrigger as-child>
            <slot name="trigger">
                <!-- <Button variant="outline"> Open </Button> -->
            </slot>
        </SheetTrigger>
        <SheetContent class="flex flex-col" :aria-describedby="undefined">
            <SheetHeader>
                <SheetClose
                    class="shrink-0 flex items-center rounded-sm opacity-70 ring-offset-background transition-opacity hover:opacity-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none data-[state=open]:bg-secondary"
                    tabindex="0"
                    :as-child="false"
                >
                    <span
                        class="i-tabler-arrow-left size-10 text-neutral-800"
                    />
                </SheetClose>
                <div class="flex grow flex-col gay-4 items-center">
                    <SheetTitle>{{ title }}</SheetTitle>
                    <SheetDescription v-if="description">
                        {{ description }}
                    </SheetDescription>
                </div>
            </SheetHeader>
            <div class="grow overflow-y-auto">
                <slot />
            </div>
            <SheetFooter v-if="$slots.footer">
                <slot name="footer" />
            </SheetFooter>
        </SheetContent>
    </SheetRoot>
</template>

<style></style>
