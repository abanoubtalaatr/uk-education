<script setup lang="ts">
import { Link } from "@inertiajs/vue3";

const props = defineProps<{
    user: User;
}>();
const page = usePage();
const isAuth = computed(() => !!page.props.auth.user);
const canShowProfile = computed(() => {
    return (
        props.user.show_personal_information ||
        props.user.id === page.props.auth?.user?.id
    );
});
</script>
<template>
    <component
        :is="canShowProfile ? Link : 'button'"
        :class="[
            'border border-primary-200 rounded-2xl relative blur-sm',
            canShowProfile || 'cursor-not-allowed',
        ]"
        :href="route('attendee.show', [user.id])"
    >
        <div class="flex items-center gap-2 p-2">
            <Avatar :user="user" />
            <div class="">
                <p class="font-medium text-primary-950">
                    {{ user.name }}
                </p>
                <p class="text-primary-600">
                    {{ user.job_title }}
                </p>
            </div>
        </div>
    </component>
</template>
