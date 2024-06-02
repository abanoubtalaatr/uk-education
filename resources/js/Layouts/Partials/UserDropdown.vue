<script setup lang="ts">
import { Link } from "@inertiajs/vue3";

const isTeamOwner = true;
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger
            class="flex items-center gap-2 group text-primary hover:text-primary-500"
            :as-child="false"
        >
            <Avatar size="xs" :user="$page.props.auth.user" />

            <span class="text-sm max-lg:hidden">{{
                $page.props.auth?.user?.name
            }}</span>
            <span class="i-radix-icons-chevron-down max-lg:hidden" />
        </DropdownMenuTrigger>

        <DropdownMenuContent align="end" side="bottom">
            <!-- <DropdownMenuItem
                :as="Link"
                :href="route('attendee.show', [$page.props.auth.user.id])"
                :label="$t('view-profile')"
                icon="i-radix-icons-person "
            /> -->
            <DropdownMenuItem
                :as="Link"
                :href="route('settings.account.show')"
                :label="$t('account-settings')"
                icon="i-radix-icons-gear "
            />
            <DropdownMenuSeparator />

            <DropdownMenuItem as-child>
                <Button
                    variant="outline"
                    :href="route('logout')"
                    method="post"
                    :label="$t('logout')"
                    icon="i-heroicons-arrow-left-start-on-rectangle"
                    roundness="circle"
                />
            </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>

<style></style>
