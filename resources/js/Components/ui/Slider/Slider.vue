<script setup lang="ts" generic="T">
//yarn add swiper
import "swiper/css/bundle";
import { ChevronLeftIcon, ChevronRightIcon } from "@radix-icons/vue";
import {
    Navigation,
    Pagination,
    Autoplay,
    FreeMode,
    Mousewheel,
    // Scrollbar,
    Parallax,
    // Thumbs,
    // Zoom,
    EffectCreative,
    EffectFade,
    EffectCoverflow,
} from "swiper/modules";
import { Swiper, SwiperSlide } from "swiper/vue";
import { computed } from "vue";
import type { SwiperOptions } from "swiper/types";

const props = withDefaults(
    defineProps<{
        list: Array<T>;
        options?: SwiperOptions;
        preset?: keyof typeof presets.value;
        hasOverflow?: boolean;
    }>(),
    {
        hasOverflow: true,
    }
);

const locale = ref("en");
const isRTL = computed(() => locale.value === "ar");

const presets = computed<
    Record<
        "default" | "creative" | "fade" | "scroll" | "coverflow",
        Partial<SwiperOptions>
    >
>(() => ({
    default: {
        slidesPerView: 1,
        spaceBetween: 5,
        grabCursor: true,
        loop: true,
        autoplay: false,
        breakpoints: {},
        // navigation: {
        //     prevEl: "[data-swiper-prev]",
        //     nextEl: "[data-swiper-next]",

        // },
        navigation: false,
        pagination: {
            enabled: false,
            clickable: true,
            // dynamicBullets: true,
            // dynamicMainBullets: 1,
        },
        speed: 500,
    },
    creative: {
        modules: [EffectCreative, Parallax],
        effect: "creative",
        loop: true,
        pagination: {
            enabled: true,
            clickable: true,
        },

        creativeEffect: {
            prev: {
                shadow: true,
                translate: [isRTL.value ? "50%" : "-50%", 0, 0],
                opacity: 0.6,
            },
            next: {
                shadow: true,
                translate: [isRTL.value ? "-100%" : "100%", 0, 90],
                opacity: 1,
            },
        },
        parallax: true,
        speed: 1000,
    },
    fade: {
        modules: [EffectFade],
        effect: "fade",
        loop: true,
        fadeEffect: {
            crossFade: true,
        },
        navigation: true,
        speed: 1000,
    },
    scroll: {
        effect: "slide",
        spaceBetween: 10,
        autoplay: {
            delay: 0,
        },
        speed: 4000,
        wrapperClass: "ease-linear",
        slidesPerView: 2,
        loop: true,
    },
    coverflow: {
        modules: [EffectCoverflow, Pagination],
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 5,
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            567: {
                slidesPerView: 3,
            },
            987: {
                slidesPerView: 4,
            },
        },
        autoplay: {
            delay: 3000,
            enabled: true,
        },
        mousewheel: false,
        // centeredSlidesBounds: true,
        loop: true,
        navigation: {
            prevEl: "[data-swiper-prev]",
            nextEl: "[data-swiper-next]",
        },
        coverflowEffect: {
            scale: 0.9,
            rotate: 10,
            stretch: 1,
            depth: 140,
            modifier: 1.2,
            slideShadows: false,
        },
        pagination: {
            enabled: false,
            clickable: true,
        },
    },
}));
const handleBreakPoints = (
    options: SwiperOptions
): SwiperOptions["breakpoints"] => {
    return Object.fromEntries(
        Object.entries(options.breakpoints).map(([key, value]) => {
            let slidesPerView = value?.slidesPerView ?? options.slidesPerView;
            if (typeof slidesPerView === "string" || !slidesPerView) {
                return [key, value];
            }

            let slidesPerGroup =
                value?.slidesPerGroup ?? options?.slidesPerGroup ?? 1;

            const loop =
                props.list?.length >= slidesPerView + slidesPerGroup
                    ? value?.loop ?? options?.loop ?? false
                    : false;

            return [key, { ...value, loop: loop }];
        })
    );
};
/** @type {ComputedRef<import('swiper/types').SwiperOptions>} */
const options = computed(() => {
    const baseOptions = {
        mousewheel: false,

        ...presets.value[props.preset ?? "default"],
        ...props.options,

        modules: [Navigation, Pagination, Autoplay, FreeMode, Mousewheel]
            .concat(props.options?.modules ?? [])
            .concat(presets.value[props.preset ?? "default"]?.modules ?? []),
    };

    const breakpoints = handleBreakPoints(baseOptions);
    return { ...baseOptions, breakpoints };
});
</script>

<template>
    <div
        :class="[
            hasOverflow && 'overflow-hidden',
            { 'swiper-mask': props.preset === 'scroll' },
        ]"
    >
        <div class="relative">
            <Swiper
                :key="locale"
                :dir="isRTL ? 'rtl' : 'ltr'"
                v-bind="options"
                :class="!hasOverflow && '!overflow-y-visible'"
            >
                <slot name="slides" :list="list">
                    <template v-for="(item, index) in list" :key="index">
                        <swiper-slide
                            :zoom="false"
                            class="!h-auto"
                            v-slot="{ isActive }"
                        >
                            <slot
                                :item="item"
                                :index="index"
                                :isActive="isActive"
                            />
                        </swiper-slide>
                    </template>
                </slot>
            </Swiper>

            <slot v-if="options.navigation" name="customNavigation">
                <button
                    class="absolute z-50 p-1 transition-colors -translate-y-1/2 rounded-full start-2 top-1/2 bg-white/70 text-primary hover:bg-white/90"
                    data-swiper-prev
                >
                    <ChevronLeftIcon
                        class="w-6 stroke-[2.5] rtl:-scale-x-100"
                    />
                </button>
                <button
                    class="absolute z-50 p-1 transition-colors -translate-y-1/2 rounded-full end-2 top-1/2 bg-white/70 text-primary hover:bg-white/90"
                    data-swiper-next
                >
                    <ChevronRightIcon
                        class="w-6 stroke-[2.5] rtl:-scale-x-100"
                    />
                </button>
            </slot>
        </div>
    </div>
</template>

<style>
:root {
    --swiper-theme-color: theme(colors.primary.DEFAULT);
    --swiper-navigation-size: 24px;
    --swiper-mask-color: white;
}

.swiper-mask .swiper {
    mask: linear-gradient(
        to right,
        transparent,
        var(--swiper-mask-color) 10%,
        var(--swiper-mask-color) 90%,
        transparent
    );
}

.swiper-pagination-bullet {
    transition: width 0.5s ease, background-color 0.5s ease;
    border-radius: 0.25rem;
}

.swiper-pagination-bullet-active {
    width: 1.5rem;
    border-radius: 0.25rem;
    transition: width 0.5s ease;
}
</style>
