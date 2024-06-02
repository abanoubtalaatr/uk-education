import plugin from "tailwindcss/plugin";
import { iconsPlugin, getIconCollections } from "@egoist/tailwindcss-icons";

export const icons = iconsPlugin({
    // Select the icon collections you want to use
    // You can also ignore this option to automatically discover all icon collections you have installed
    collections: {
        app: {
            icons: {
                loading: {
                    // svg body
                    body: '<defs><linearGradient id="b"><stop stop-color="currentColor" stop-opacity="0" offset=".5"/><stop stop-color="currentColor" stop-opacity=".5" offset="1"/></linearGradient><linearGradient id="a"><stop stop-color="currentColor" offset="0"/><stop stop-color="currentColor" stop-opacity=".5" offset="1"/></linearGradient></defs><g fill="transparent" stroke-width="3"><path d="m3 12a9 9 0 0 1 18 0" stroke="url(#b)"/><path d="m21 12a9 9 0 1 1-18 0" stroke="url(#a)"/><path d="m3 12z" stroke="currentColor" stroke-linecap="round"/><animateTransform attributeName="transform" dur="1.2s" from="0 12 12" repeatDur="indefinite" to="360 12 12" type="rotate"/></g>',
                    // svg width and height, optional
                    width: 24,
                    height: 24,
                },
                "loading-dots": {
                    // svg body
                    body: '<circle fill="currentColor" stroke="none" cx="25" cy="10" r="6"><animate attributeName="opacity" dur="1s" values="1;0.2;1" repeatCount="indefinite" begin="0.1"/></circle><circle fill="currentColor" stroke="none" cx="50" cy="10" r="6"><animate attributeName="opacity" dur="1s"  values="1;0.2;1" repeatCount="indefinite" begin="0.2"/></circle><circle fill="currentColor" stroke="none" cx="75" cy="10" r="6"><animate attributeName="opacity" dur="1s"  values="1;0.2;1" repeatCount="indefinite" begin="0.3"/></circle>',
                    // svg width and height, optional
                    width: 100,
                    height: 20,
                },
                "loading-dots-2": {
                    // svg body
                    body: '<g fill="currentColor" stroke="none"> <circle cx="25" cy="10" r="6" > <animate attributeName="r" begin="0.1s" dur="1s" values="1;7;1" repeatCount="indefinite" /> <animate attributeName="opacity" begin="0.1" dur="1s" values="0.2;1;0.2" repeatCount="indefinite" /> </circle> <circle cx="50" cy="10" r="6" > <animate attributeName="r" begin="0.3s" dur="1s" values="1.5;7;1.5" repeatCount="indefinite" /> <animate attributeName="opacity" begin="0.2" dur="1s" values="0.2;1;0.2" repeatCount="indefinite" /> </circle> <circle cx="75" cy="10" r="6" > <animate attributeName="r" begin="0.5s" dur="1s" values="2;7;2" repeatCount="indefinite" /> <animate attributeName="opacity" begin="0.3" dur="1s" values="0.2;1;0.2" repeatCount="indefinite" /> </circle> </g>',
                    // svg width and height, optional
                    width: 100,
                    height: 20,
                },
                facebook: {
                    // svg body
                    body: '<path fill="currentColor" d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4z"/>',
                    // svg width and height, optional
                    width: 24,
                    height: 24,
                },
                instagram: {
                    // svg body
                    body: '<path fill="currentColor" d="M12.001 9a3 3 0 1 0 0 6a3 3 0 0 0 0-6m0-2a5 5 0 1 1 0 10a5 5 0 0 1 0-10m6.5-.25a1.25 1.25 0 0 1-2.5 0a1.25 1.25 0 0 1 2.5 0M12.001 4c-2.474 0-2.878.007-4.029.058c-.784.037-1.31.142-1.798.332a2.886 2.886 0 0 0-1.08.703a2.89 2.89 0 0 0-.704 1.08c-.19.49-.295 1.015-.331 1.798C4.007 9.075 4 9.461 4 12c0 2.475.007 2.878.058 4.029c.037.783.142 1.31.331 1.797c.17.435.37.748.702 1.08c.337.336.65.537 1.08.703c.494.191 1.02.297 1.8.333C9.075 19.994 9.461 20 12 20c2.475 0 2.878-.007 4.029-.058c.782-.037 1.308-.142 1.797-.331a2.91 2.91 0 0 0 1.08-.703c.337-.336.538-.649.704-1.08c.19-.492.296-1.018.332-1.8c.052-1.103.058-1.49.058-4.028c0-2.474-.007-2.878-.058-4.029c-.037-.782-.143-1.31-.332-1.798a2.912 2.912 0 0 0-.703-1.08a2.884 2.884 0 0 0-1.08-.704c-.49-.19-1.016-.295-1.798-.331C14.926 4.006 14.54 4 12 4m0-2c2.717 0 3.056.01 4.123.06c1.064.05 1.79.217 2.427.465c.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428c.047 1.066.06 1.405.06 4.122c0 2.717-.01 3.056-.06 4.122c-.05 1.065-.218 1.79-.465 2.428a4.884 4.884 0 0 1-1.153 1.772a4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.427.465c-1.067.047-1.406.06-4.123.06c-2.717 0-3.056-.01-4.123-.06c-1.064-.05-1.789-.218-2.427-.465a4.89 4.89 0 0 1-1.772-1.153a4.905 4.905 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.012 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122c.05-1.065.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.637-.248 1.362-.415 2.427-.465C8.945 2.013 9.284 2 12.001 2"/>',
                    // svg width and height, optional
                    width: 24,
                    height: 24,
                },
                whatsapp: {
                    // svg body
                    body: '<path fill="currentColor" d="M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01m-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.264 8.264 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.183 8.183 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23m4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07c0 1.22.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28"/>',
                    // svg width and height, optional
                    width: 24,
                    height: 24,
                },
                twitter: {
                    // svg body
                    body: '<path fill="currentColor" d="M8.5 2h2.5L11 2h-2.5zM13 2h2.5L15.5 2h-2.5zM10.5 2h5v0h-5zM8.5 2h5v0h-5zM10 2h3.5L13.5 2h-3.5z"><animate fill="freeze" attributeName="d" dur="0.8s" keyTimes="0;0.3;0.5;1" values="M8.5 2h2.5L11 2h-2.5zM13 2h2.5L15.5 2h-2.5zM10.5 2h5v0h-5zM8.5 2h5v0h-5zM10 2h3.5L13.5 2h-3.5z;M8.5 2h2.5L11 22h-2.5zM13 2h2.5L15.5 22h-2.5zM10.5 2h5v2h-5zM8.5 20h5v2h-5zM10 2h3.5L13.5 22h-3.5z;M8.5 2h2.5L11 22h-2.5zM13 2h2.5L15.5 22h-2.5zM10.5 2h5v2h-5zM8.5 20h5v2h-5zM10 2h3.5L13.5 22h-3.5z;M1 2h2.5L18.5 22h-2.5zM5.5 2h2.5L23 22h-2.5zM3 2h5v2h-5zM16 20h5v2h-5zM18.5 2h3.5L5 22h-3.5z"/></path>',
                    // svg width and height, optional
                    width: 24,
                    height: 24,
                },
            },
        },
        ...getIconCollections(["radix-icons", "heroicons"]),
    },
});
