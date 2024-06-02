<script setup lang="ts">

const props = defineProps<{
    user: User,
    event: TEvent
}>();

const attendForm = useForm([]);

const attendUser = () => {
    attendForm.put(route("events.attend.admin", [props.event.id, props.user.id]), {
        preserveScroll: true,
        preserveState: true,
    });
}

const removeUserAttendance = () => {
    attendForm.delete(route("events.un-attend.admin", [props.event.id, props.user.id]), {
        preserveScroll: true,
        preserveState: true,
    });
}

</script>
<template>
    <div class="flex justify-between items-center p-2 border border-primary-200 rounded-2xl">
        <Link
            class="flex items-center gap-2"
            :href="route('attendee.show', [user.id])"
        >
            <Avatar :user="user" />
            <div class="">
                <p class="font-medium text-primary-950">
                    {{ user.name }}
                </p>
                <p class="text-primary-600">
                    {{ user.job_title }}
                </p>
            </div>
        </Link>
        <Button v-if="$page.props.auth?.user?.is_admin && ! user.pivot.attended" @click="attendUser">
            Mark as Attended
        </Button>
        <Button v-if="$page.props.auth?.user?.is_admin && user.pivot.attended" variant="destructive" @click="removeUserAttendance">
            Remove from Attendance
        </Button>
    </div>
</template>
