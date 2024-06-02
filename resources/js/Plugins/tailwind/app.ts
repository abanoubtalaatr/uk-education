import plugin from "tailwindcss/plugin";

export const appPlugin = plugin(function ({
    matchUtilities,
    theme,
    addUtilities,
    addComponents,
}) {
    addUtilities({
        ".text-truncate": {
            "@apply break-all text-start line-clamp-1": {},
        },
        ".text-truncate-2": {
            "@apply overflow-hidden text-ellipsis whitespace-nowrap": {},
        },
    });
    addComponents({
        ".page-wrapper": {
            "@apply space-y-6": {},
        },
        ".auth-title": {
            "@apply font-bold text-4xl text-primary font-alegreya-sans-sc capitalize mb-4":
                {},
        },
        ".title-2xl": {
            "@apply text-2xl font-bold font-alegreya-sans-sc": {},
        },
        ".card-title": {
            "@apply text-lg font-medium text-primary": {},
        },
        ".card-description": {
            "@apply text-xs text-primary-600": {},
        },
        ".home-title": {
            "@apply text-3xl font-bold font-alegreya-sans-sc": {},
        },
        ".home-header": {
            "@apply flex justify-between max-md:flex-col": {},
        },
    });
},
{});
