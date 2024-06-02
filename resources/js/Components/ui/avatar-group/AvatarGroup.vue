<script setup lang="ts">
import { cva } from "class-variance-authority";
import { PopoverArrow } from "radix-vue";
import { twMerge } from "tailwind-merge";

const props = withDefaults(
    defineProps<{
        users: Users | SimpleUsers;
        size?: "2xs" | "xs" | "sm" | "md" | "lg" | "xl" | "5xl";
        limit?: number;
    }>(),
    {
        size: "sm",
        limit: 4,
    }
);

const spaceClasses = computed(() => {
    return cva([""], {
        variants: {
            size: {
                "2xs": "-space-x-2  ",
                xs: "-space-x-2 ",
                sm: "-space-x-4 ",
                md: "-space-x-2 ",
                lg: "-space-x-2 ",
                xl: "-space-x-2 ",
                "5xl": "-space-x-2 ",
            },
        },
    })({
        size: props.size,
    });
});
const widthClasses = computed(() => {
    return cva([""], {
        variants: {
            size: {
                "2xs": "w-6 h-6 text-[10px]",
                xs: "w-8 h-8 text-xs",
                sm: "w-10 h-10 text-sm",
                md: "w-12 h-12 text-sm",
                lg: "w-13 h-13 text-sm",
                xl: "w-14 h-14 text-base",
                "5xl": "w-14 h-14 text-base",
            },
        },
    })({
        size: props.size,
    });
});
</script>

<template>
    <TooltipProvider :skip-delay-duration="1000" :delay-duration="100">
        <div
            v-if="users?.length"
            :class="[
                'isolate flex items-center rtl:space-x-reverse',
                spaceClasses,
            ]"
        >
            <template
                v-for="(user, index) in users.slice(0, limit)"
                :key="user.id"
            >
                <Link
                    @click.stop.prevent=""
                    :href="route('attendee.show', [user])"
                >
                    <Avatar :user="user" :size="size" class="hover:z-10" />
                </Link>
            </template>
            <template v-if="users?.length > limit">
                <Popover>
                    <Tooltip
                        :delay-duration="20"
                        :disable-hoverable-content="true"
                    >
                        <TooltipTrigger content="click to view all users">
                            <PopoverTrigger @click.stop.prevent="" as-child>
                                <Button
                                    :class="[twMerge('text-primary', 'ms-5')]"
                                    variant="ghost"
                                >
                                    <span>{{
                                        `+${users.length - limit} More`
                                    }}</span>
                                </Button>
                            </PopoverTrigger>
                        </TooltipTrigger>

                        <PopoverContent>
                            <div class="space-y-2 overflow-y-auto max-h-60">
                                <template
                                    v-for="(user, index) in users"
                                    :key="user.id"
                                >
                                    <Link
                                        @click.stop.prevent=""
                                        :href="route('attendee.show', [user])"
                                        class="flex items-center gap-4"
                                    >
                                        <Avatar
                                            size="sm"
                                            :user="user"
                                            tooltip-disabled
                                        />
                                        <span v-text="user?.name" class="" />
                                    </Link>
                                </template>
                            </div>
                            <PopoverArrow />
                        </PopoverContent>
                    </Tooltip>
                </Popover>
            </template>
        </div>
    </TooltipProvider>
</template>

<style></style>
