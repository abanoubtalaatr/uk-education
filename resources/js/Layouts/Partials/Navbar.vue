<script setup lang="ts">
import Label from "@/Components/ui/label/Label.vue";
import { VisuallyHidden } from "radix-vue";

const navItems = computed(() => [
    {
        label: trans("find-events"),
        href: route("events.index"),
        active: route().current("events.*"),
    },
    {
        label: trans("my-events"),
        href: route("my-event"),
        active: route().current("my-event"),
    },
    {
        label: trans("home"),
        href: route("home"),
        active: route().current("home"),
    },
]);
const publicLinks = computed(() => [
    {
        label: trans("terms-of-services"),
        href: "",
    },
    {
        label: trans("privacy-policy"),
        href: "",
    },
    {
        label: trans("cookie-policy"),
        href: "",
    },
]);

const publicNavLinks = computed(() => [
    {
        label: trans("find-events"),
        href: route("public.events.index"),
        active: route().current("public.events.*"),
    },
]);

const open = ref(false);
onUnmounted(router.on("navigate", () => (open.value = false)));
window.matchMedia("(min-width: 1024px)").addEventListener("change", (e) => {
    if (e.matches) {
        open.value = false;
    }
});
const page = usePage();
const isLogin = computed(() => page.props?.auth?.user);
const locale = computed(() => page.props.locale);
</script>
<template>
    <div class="container">
        <nav
            class="flex items-center justify-between gap-6 py-2 border-b border-primary"
        >
            <Link :href="route('home')">
                <ApplicationLogo class="text-black" />
            </Link>
            <div class="hidden gap-3 lg:flex" v-if="isLogin">
                <template v-for="item in navItems">
                    <NavLink :href="item.href" :active="item.active"
                        >{{ item.label }}
                    </NavLink>
                </template>
            </div>
            <div v-else class="hidden gap-3 lg:flex">
                <template v-for="item in publicNavLinks">
                    <NavLink :href="item.href" :active="item.active"
                    >{{ item.label }}
                    </NavLink>
                </template>
            </div>
            <span class="ms-auto" />
            <LangSwitcher variant="ghost" />
            <UserDropdown v-if="isLogin" />
            <div
                class="space-x-3 rtl:space-x-reverse max-lg:hidden"
                v-if="!isLogin"
            >
                <Button :label="$t('login')" :href="route('login')" />
                <Button
                    :label="$t('register')"
                    :href="route('register')"
                    variant="outline"
                />
            </div>
            <!-- responsive navbar -->
            <SheetRoot v-model:open="open">
                <SheetTrigger as-child>
                    <Button
                        variant="ghost"
                        size="icon"
                        class="lg:hidden"
                        icon="i-radix-icons-hamburger-menu  "
                    />
                </SheetTrigger>
                <SheetContent
                    class="flex flex-col h-auto gap-0 p-0 px-4 border-0 rounded-md bottom-2 start-2 top-2 w- bg-primary"
                    :aria-describedby="undefined"
                    :show-close-button="false"
                    :side="'start'"
                >
                    <VisuallyHidden>
                        <DialogTitle>sidebar navigation</DialogTitle>
                    </VisuallyHidden>
                    <SheetHeader
                        class="flex flex-row items-start justify-between py-4"
                    >
                        <ApplicationLogo class="text-white" />
                        <DialogClose>
                            <Button
                                icon="i-radix-icons-cross-2"
                                aria-label="Close"
                                class="p-0 size-5"
                            />
                        </DialogClose>
                    </SheetHeader>
                    <div
                        class="grow overflow-y-auto [scrollbar-gutter:stable;] space-y-2 mt-3"
                    >
                        <div v-if="isLogin">
                            <template v-for="item in navItems">
                                <ResponsiveNavLink
                                    :href="item.href"
                                    :active="item.active"
                                >
                                    {{ item.label }}
                                </ResponsiveNavLink>
                            </template>
                        </div>

                        <template v-for="item in publicLinks">
                            <ResponsiveNavLink
                                :href="item.href"
                                :active="item.active"
                            >
                                {{ item.label }}
                            </ResponsiveNavLink>
                        </template>
                        <div class="grid grid-cols-2 gap-6" v-if="!isLogin">
                            <Button
                                :label="$t('login')"
                                :href="route('login')"
                                variant="secondary"
                            />
                            <Button
                                :label="$t('register')"
                                :href="route('register')"
                                variant="ghost"
                                class="text-white border-white"
                            />
                        </div>
                    </div>
                </SheetContent>
            </SheetRoot>
        </nav>
    </div>
</template>
