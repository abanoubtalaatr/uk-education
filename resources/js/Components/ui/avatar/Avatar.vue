<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import type { AvatarVariants } from ".";

const props = defineProps<{
    class?: HTMLAttributes["class"];
    imageClass?: HTMLAttributes["class"];
    size?: AvatarVariants["size"];
    shape?: AvatarVariants["shape"];
    alt?: string;
    src?: string;
    user?: User | SimpleUser;
}>();

defineOptions({ inheritAttrs: false });
const resolvedSrc = computed(() => {
    const url = `https://ui-avatars.com/api/?name=${props.user?.name}&color=ffffff&background=#020202`;
    return props.src ?? props.user?.profile_photo_url?.length
        ? props.user?.profile_photo_url
        : url;
});

const resolvedAlt = computed(() => props.user?.name ?? props.alt);
</script>

<template>
    <AvatarRoot :class :size :shape>
        <AvatarImage
            v-if="resolvedSrc"
            :src="resolvedSrc"
            :alt="resolvedAlt"
            :class="imageClass"
        />
        <AvatarFallback />
    </AvatarRoot>
</template>

<style></style>
