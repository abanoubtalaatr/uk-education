<script setup lang="ts">
const props = defineProps<{
    url: String;
    text: String;
}>();
const openInNewWindows = (route) => {
    window.open(route, "popup", "width=600,height=600");
};

const { text, copy, copied, isSupported } = useClipboard({
    source: props.url,
});
// const shareButtons = computed(() => [
//     {
//         icon: "i-app-facebook",
//         ariaLabel: trans("share-on-facebook"),
//         share: () =>
//             openInNewWindows(
//                 `https://www.facebook.com/sharer/sharer.php?u=${props.url}?title=${text}`
//             ),
//     },
//     {
//         icon: "i-app-twitter",
//         ariaLabel: trans("share-on-twitter"),
//         share: () =>
//             openInNewWindows(
//                 `https://twitter.com/intent/tweet?text=${text}&url=${url}`
//             ),
//     },
//     {
//         icon: "i-app-twitter",
//         ariaLabel: trans("share-on-twitter"),
//         share: () =>
//             openInNewWindows(
//                 `https://twitter.com/intent/tweet?text=${text}&url=${url}`
//             ),
//     },
// ]);
</script>

<template>
    <section class="flex gap-3">
        <!-- <button
            @click.prevent="
                openInNewWindows(
                    `https://www.linkedin.com/sharing/share-offsite/?url=${url}?title=${text}`
                )
            "
        >
            <Linkedin class="w-6 text-[#0a66c2]" fill="#0a66c2" />
        </button> -->
        <Button
            @click.prevent="
                openInNewWindows(
                    `https://www.facebook.com/sharer/sharer.php?u=${url}?title=${text}`
                )
            "
            icon="i-app-facebook"
            size="icon-sm"
            :arial-label="$t('share-on-facebook')"
        />
        <Button
            @click.prevent="
                openInNewWindows(
                    `https://twitter.com/intent/tweet?text=${text}&url=${url}`
                )
            "
            size="icon-sm"
            icon="i-app-twitter"
            :arial-label="$t('share-on-twitter')"
        />

        <Button
            as="a"
            target="_blank"
            :href="`whatsapp://send?text=${text}\n ${url}`"
            data-action="share/whatsapp/share"
            :aria-label="$t('share-on-whatsapp')"
            icon="i-app-whatsapp"
            size="icon-sm"
        />
        <Button
            @click="copy(url)"
            :label="$t('copy-link')"
            :icon="copied ? 'i-radix-icons-check' : 'i-radix-icons-copy'"
            variant="link"
            trailing
        />
    </section>
</template>

<style></style>
