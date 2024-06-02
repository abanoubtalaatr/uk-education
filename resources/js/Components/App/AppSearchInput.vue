<script setup lang="ts">
const { query, searchForm, search, clear } = useSearch();
</script>
<template>
    <div class="flex items-center gap-2">
        <Input
            icon="i-radix-icons-magnifying-glass"
            leading
            :loading="searchForm.processing"
            v-model="query"
            :placeholder="$t('search')"
            class="rounded-2xl grow"
            @keydown.enter="search"
        >
            <template #trailing>
                <Button
                    aria-label="clear"
                    icon="i-radix-icons-cross-2"
                    @click="clear"
                    size="sm"
                    :class="{ invisible: !query.length }"
                    variant="link"
                />
            </template>
        </Input>
        <Button
            class="font-medium uppercase font-alegreya-sans-sc rounded-2xl"
            :label="$t('search')"
            @click="search"
        />
    </div>
</template>
