import { type ClassValue, clsx } from "clsx";
import { twMerge } from "tailwind-merge";

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}
export function formatDate(
    date: Date | string,
    format: string = "DD MMM, YYYY - hh:mm A"
): string {
    if (!date) return "";
    const page = usePage();
    const locale = computed(() => page.props.locale);

    return dayjs(date).locale(locale.value).format(format);
}

export function formateCurrency(
    value: number | bigint | undefined,
    options?: Intl.NumberFormatOptions,
    locales?: string | string[]
) {
    if (!value) return;
    const defaultOptions: Intl.NumberFormatOptions = {
        style: "currency",
        currency: import.meta.env.VITE_APP_CURRENCY ?? "USD",
        minimumFractionDigits: 0,
    };
    return new Intl.NumberFormat(locales, {
        ...defaultOptions,
        ...(options ?? {}),
    }).format(value);
}

export const removeQueryParameter = (parameter: string) => {
    let url = new URL(window.location.toString());
    url.searchParams.delete(parameter);
    history.replaceState(null, "", url.href);
};

export const setQueryParameter = (parameter: string, value: string) => {
    const url = new URL(window.location.toString());
    url.searchParams.set("global_search", value);
    history.replaceState(null, "", url.href);
};

export const toBoolean: (value: string) => boolean = (value) => {
    return value === "false" || value === "0" || value === "" ? false : true;
};

export const getStoragePath = (value?: string) => {
    if (!value) return;
    return `/storage/${value}`;
};

export const parseJson = <T>(obj: T) => {
    if (!obj) return;
    return JSON.parse(obj as string) as T;
};

export default function getPaginatedIndex(index: number, perPage = 12) {
    return index + 1 + ((+(route().params?.page as string) || 1) - 1) * perPage;
}

export const isString = (value: unknown): value is string => {
    return typeof value === "string";
};

export const getImgPlaceholder = (name: string, bgColor = "#020202") =>
    `https://ui-avatars.com/api/?name=${name
        .split(" ")
        .join("+")}&color=ffffff&background=${bgColor}`;
