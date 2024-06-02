<script setup lang="ts">
type Filter =
    | {
          label: string;
          key: "event_type";
          options: EventTypes;
      }
    | {
          label: string;
          key: "city";
          options: Cities;
      }
    | {
          label: string;
          key: "brand";
          options: Brands;
      };
declare module "@inertiajs/core" {
    interface PageProps {
        cities: Resource<Cities>;
        brands: Resource<Brands>;
        event_types: Resource<EventTypes>;
    }
}

const page = usePage();
const filters = computed<Filter[]>(() => [
    {
        label: trans("city"),
        key: "city",
        options: page.props.cities?.data ?? [],
    },
    {
        label: trans("brand"),
        key: "brand",
        options: page.props.brands?.data ?? [],
    },
    {
        label: trans("event-type"),
        key: "event_type",
        options: page.props.event_types?.data ?? [],
    },
]);
const filterForm = useForm<
    Record<Filter["key"] | "date", number[] | string | undefined>
>({
    city: [],
    brand: [],
    event_type: [],
    date: route().params?.date ?? undefined,
});
watch(
    () => filterForm.data(),
    () => {
        filterForm.get(route(route().current()), {
            preserveScroll: true,
            preserveState: true,
        });
    },
    {
        deep: true,
    }
);
</script>
<template>
    <div class="flex items-center max-w-xl gap-2">
        <div class="flex items-center gap-2">
            <template v-for="filter in filters" :key="filter.key">
                <Combobox
                    :placeholder="() => filter.label"
                    :options="filter.options"
                    option-label="name"
                    option-value="id"
                    v-model="filterForm[filter.key]"
                    roundness="circle"
                    multiple
                    class="max-w-48"
                />
            </template>
            <DateInput
                :style="{ '--dp-border-radius': '9999px' }"
                v-model="filterForm.date"
                :placeholder="$t('pick-date')"
                class="max-w-48 filter-date"
                auto-apply
            />
        </div>
    </div>
</template>
