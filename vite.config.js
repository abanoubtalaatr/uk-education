import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

import AutoImport from "unplugin-auto-import/vite";
import Components from "unplugin-vue-components/vite";
import path from "path";
import fs from "node:fs";

function getUIComponentFolders() {
    const uiDirectory = path.resolve("resources/js/Components/ui"); // Change this to your UI components directory path
    const folders = fs
        .readdirSync(uiDirectory, { withFileTypes: true })
        .filter((dirent) => dirent.isDirectory())
        .map((dirent) => dirent.name);
    return folders;
}
const uiComponents = getUIComponentFolders();

export default defineConfig({
    plugins: [
        laravel({
            input: "resources/js/app.js",
            ssr: "resources/js/ssr.js",
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        AutoImport({
            dirs: [
                "./resources/js/Composables",
                "./resources/js/utils",
                // "./resources/js/Stores",
            ],
            imports: [
                "vue",
                "@vueuse/core",
                {
                    "@inertiajs/vue3": ["useForm", "usePage", "router"],
                },
                {
                    "class-variance-authority": ["cva"],
                },
                {
                    "radix-vue": [
                        "useForwardPropsEmits",
                        "useForwardProps",
                        "useEmitAsProps",
                    ],
                },
                {
                    dayjs: [["default", "dayjs"]],
                },
                {
                    uuid: [["v4", "uuid"]],
                },
                {
                    "laravel-vue-i18n": ["trans", "wTrans"],
                },
                {
                    notivue: [["push", "notivuePush"]],
                },

                // {
                //     "vue-sonner": ["toast"],
                // },
            ],
            vueTemplate: true,
            dts: true,
        }),
        Components({
            dts: "./auto-components.d.ts",
            resolvers: [
                {
                    resolve: (componentName) => {
                        if (["Link", "Head"].includes(componentName)) {
                            return {
                                name: componentName,
                                from: "@inertiajs/vue3",
                            };
                        }
                        if (["VisuallyHidden"].includes(componentName)) {
                            return {
                                name: componentName,
                                from: "radix-vue",
                            };
                        }
                        if (["DatePicker"].includes(componentName)) {
                            return {
                                name: "default",
                                as: "DatePicker",
                                from: "@vuepic/vue-datepicker",
                            };
                        }
                        if (
                            ["Notification", "Notivue"].includes(componentName)
                        ) {
                            return {
                                name: componentName,
                                from: "notivue",
                            };
                        }
                    },
                    type: "component",
                },
                {
                    type: "directive",
                    resolve: async (name) => {
                        const esComponentsFolder = "element-plus/es/components";
                        if (name === "InfiniteScroll") {
                            return {
                                name: "ElInfiniteScroll",
                                from: "element-plus/es",
                            };
                        }
                    },
                },
            ],
            directoryAsNamespace: true,
            globalNamespaces: [
                "Partials",
                "partials",
                "resources",
                "js",
                "Layouts",
                "layouts",
                "Pages",
                "Components",
                "ui",
                ...uiComponents,
            ],
            collapseSamePrefixes: true,
            dirs: [
                "./resources/js/Components",
                "./resources/js/Layouts",
                "./resources/js/Pages",
            ],
        }),
    ],
});
