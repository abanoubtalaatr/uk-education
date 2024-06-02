<script setup lang="ts">
const page = usePage();
const locale = computed(() => page.props.locale);
</script>
<template>
    <div class="relative flex w-full gap-6 bg-primary">
        <div
            :style="{
                '-webkit-text-fill-color': 'transparent',
                '-moz-text-fill-color': 'transparent',
            }"
            :class="[
                'font-bold uppercase text-center font-alegreya-sans-sc  text-5xl md:text-[7rem] ',
                'bg-gradient-to-b from-white/60 to-primary-900 from-5%  to-70% bg-clip-text',
                'absolute w-full',
            ]"
        >
            {{ $t("dont-speed") }}
        </div>
        <div class="max-w-lg">
            <img
                :src="'/images/call_action_section.webp'"
                :style="[locale == 'ar' && 'transform: rotateY(180deg);']"
            />
        </div>
        <div class="relative z-10 self-end w-full p-12 text-end">
            <div class="space-y-6">
                <h2 class="text-white home-title">
                    {{ $t("your-journey-starts-here") }}
                </h2>
                <p class="text-white">
                    {{
                        $t(
                            "discover-the-perfect-events-for-every-interest-and-passion"
                        )
                    }}
                </p>
            </div>
        </div>
    </div>
</template>
