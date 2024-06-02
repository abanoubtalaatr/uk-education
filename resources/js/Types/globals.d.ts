export {};
import { route as routeFn } from "ziggy-js";
declare global {
    declare const route: typeof routeFn;
}
declare module "@vue/runtime-core" {
    export interface GlobalComponents {}
    interface ComponentCustomProperties {
        route: typeof routeFn;
    }
    interface ComponentCustomOptions {
        layout?: Component;
    }
}
declare module "@inertiajs/core" {
    interface PageProps {
        auth: {
            user: User;
        };
    }
}
