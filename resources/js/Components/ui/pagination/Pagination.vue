<script setup lang="ts">
import {
    useForwardPropsEmits,
    type PaginationRootEmits,
    type PaginationRootProps,
} from "radix-vue";
import {
    Pagination,
    PaginationEllipsis,
    PaginationFirst,
    PaginationLast,
    PaginationList,
    PaginationListItem,
    PaginationNext,
    PaginationPrev,
} from "@/Components/ui/pagination";

const props = withDefaults(
    defineProps<
        PaginationRootProps & {
            meta?: PaginationMeta;
            pageName?: string;
            showPageSize?: boolean;
        }
    >(),
    {
        pageName: "page",
        showPageSize: true,
        showEdges: true,
    }
);
const emits = defineEmits<PaginationRootEmits>();
const forwarded = useForwardPropsEmits(props, emits);
const paginationData = computed(() => {
    return {
        total: props.meta?.total ?? props.total,
        itemsPerPage: props.meta?.per_page ?? props.itemsPerPage,
        defaultPage: Number(route().params?.page as string) || 1,
    };
});
const handlePageChange = (page: string | number) => {
    router.reload({ data: { [props.pageName]: page } });
};

//per page handling
const pageSizeInitial = computed(() => {
    return props.meta ? props.meta.per_page : props.itemsPerPage;
});
const pageSizePresets = computed(() => {
    let presets = [10, 20, 30, 40, 50, 100];

    if (presets.includes(+pageSizeInitial.value)) {
        return presets;
    } else {
        presets.push(pageSizeInitial.value);
        presets.sort((a, b) => a - b);
        return presets;
    }
});

const pageSize = ref(String(pageSizeInitial.value));
const handlePageSizeChange = (pageSize: string) => {
    router.reload({
        data: { ["page_size"]: pageSize, [props.pageName]: 1 },
    });
};
</script>

<template>
    <Pagination
        v-slot="{ page, pageCount }"
        @update:page="handlePageChange"
        v-bind="{ ...forwarded, ...paginationData }"
        class="flex justify-between gap-4 my-4"
        :page="meta?.current_page"
    >
        <div v-if="props.meta" class="flex items-center gap-2">
            <SelectRoot
                v-if="props.meta?.total"
                v-model="pageSize"
                @update:model-value="handlePageSizeChange"
            >
                <SelectTrigger
                    class="h-6 w-[60px] border-secondary-50 bg-secondary-50"
                >
                    <SelectValue :placeholder="`${pageSize}`" />
                </SelectTrigger>
                <SelectContent position="item-aligned" side="top">
                    <SelectItem
                        v-for="pageSize in pageSizePresets"
                        :key="pageSize"
                        :value="`${pageSize}`"
                    >
                        {{ pageSize }}
                    </SelectItem>
                </SelectContent>
            </SelectRoot>

            <template v-if="pageCount > 1">
                <span class="text-sm text-muted-foreground">
                    {{ $t("items-per-page") }}</span
                >

                <span
                    v-if="meta?.from && meta?.to"
                    class="text-sm text-primary"
                >
                    {{
                        $t("start-end-of-itemscount-items", {
                            itemsCount: String(meta?.total),
                            start: meta?.from,
                            end: meta?.to,
                        })
                    }}
                </span>
            </template>
        </div>
        <PaginationList
            v-if="pageCount > 1"
            v-slot="{ items }"
            class="flex items-center gap-2"
        >
            <SelectRoot
                :model-value="route().params[pageName] || '1'"
                @update:model-value="handlePageChange"
            >
                <SelectTrigger
                    class="h-6 w-[50px] border-secondary-50 bg-secondary-50"
                >
                    <SelectValue :placeholder="`${page}`" />
                </SelectTrigger>
                <SelectContent position="item-aligned" side="top">
                    <template v-for="(item, index) in pageCount" :key="item">
                        <SelectItem :value="item?.toString()">
                            {{ item }}
                        </SelectItem>
                    </template>
                </SelectContent>
            </SelectRoot>
            <span class="text-sm text-muted-foreground">
                {{ $t("of-count-pages", { count: String(pageCount) }) }}
            </span>
            <PaginationPrev />

            <PaginationNext />
        </PaginationList>
    </Pagination>
</template>
