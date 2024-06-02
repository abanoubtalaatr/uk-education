import { watch, ref } from "vue";
import { useDebounceFn } from "@vueuse/core";
import { router } from "@inertiajs/vue3";

export default function useSearch(options?: {
	withQueryParam: boolean;
	parameterName: string;
}) {
	const { parameterName = "search", withQueryParam = true } = options ?? {};
	const query = ref<string>((route().params?.[parameterName] as string) ?? "");

	const currentLocation = withQueryParam
		? location.href
		: location.origin + location.pathname;
	const searchForm = useForm({});
	const search = () => {
		searchForm
			.transform((data) => {
				return query.value?.length ? { [parameterName]: query.value } : {};
			})
			.get(currentLocation, {
				preserveState: true,
				preserveScroll: true,
				replace: true,
			});
	};
	const clear = () => {
		query.value = "";
	}
	watch(
		query,
		useDebounceFn(
			(newQuery) => {
				search();
			},
			500,
			{
				maxWait: 1500,
			}
		)
	);

	return { query, searchForm, search,clear };
}
