import "./bootstrap";
import "../css/app.css";
import "@vuepic/vue-datepicker/dist/main.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import ElementPlus from "element-plus";
import "element-plus/dist/index.css";
import { appPlugin } from "./Plugins/vue-app";
import "dayjs/locale/ar";
import preParsePostFormat from "dayjs/plugin/preParsePostFormat";
import LocaleData from "dayjs/plugin/localeData";

import { createNotivue } from "notivue";
import "notivue/notification.css";
import "notivue/animations.css";

dayjs.extend(LocaleData);
dayjs.extend(preParsePostFormat);

const notivue = createNotivue({
    enqueue: true,
    limit: 3,
});

const appName = import.meta.env.VITE_APP_NAME || "ARS ";

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(ElementPlus)
            .use(appPlugin)
            .use(notivue)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
