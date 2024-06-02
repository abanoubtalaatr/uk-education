// import { getTemplateKey } from "@/Composables/getTemplateKey";
import { cn } from "@/utils";
import { autoAnimatePlugin, vAutoAnimate } from "@formkit/auto-animate/vue";
import type { App, Plugin } from "vue";
import { i18nVue } from "laravel-vue-i18n";

// import Toast, { type POSITION } from "vue-toastification";
// import { type PluginOptions } from "vue-toastification/dist/types/types";
// import "vue-toastification/dist/index.css";
// import { createPinia } from "pinia";
// import { permissionsPlugin } from "@/plugins/permissions";

// const pinia = createPinia();

export const appPlugin: Plugin = {
    install(app: App, options) {
        app.use(autoAnimatePlugin);
        app.use(i18nVue, {
            resolve: async (lang: string) =>
                await import(`../../../lang/${lang}.json`),
        });
        app.directive("focus", (el, binding) => {
            if (!binding.value) return;
            el.focus();
        });
        // app.use(permissionsPlugin);
        // app.use(Toast, toastOptions);
        // app.use(VueApexCharts);
        // app.use(pinia);
        app.config.globalProperties.parseJson = parseJson;
        app.config.globalProperties.cn = cn;
        app.config.globalProperties.formatDate = formatDate;
        app.config.globalProperties.formateCurrency = formateCurrency;
        // app.config.globalProperties.toast = toast;
        // app.config.globalProperties.getTemplateKey = getTemplateKey;
        // app.config.globalProperties.getSettingsKey = getSettingsKey;
        // app.config.globalProperties.getStoragePath = getStoragePath;
        // app.config.globalProperties.$GOOGLE_MAPS_API_KEY =
        //     import.meta.env.VITE_GOOGLE_MAPS_API_KEY;
    },
};
declare module "@vue/runtime-core" {
    interface ComponentCustomProperties {
        cn: typeof cn;
        formatDate: typeof formatDate;
        formateCurrency: typeof formateCurrency;
        getStoragePath: typeof getStoragePath;
        parseJson: typeof parseJson;
        $t: typeof trans;
        // getTemplateKey: typeof getTemplateKey;
        // getSettingsKey: typeof getSettingsKey;
        vAutoAnimate: typeof vAutoAnimate;
        // toast: typeof toast;
        // $GOOGLE_MAPS_API_KEY: string;
    }
}
