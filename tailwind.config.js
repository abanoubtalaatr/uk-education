import animate from "tailwindcss-animate";
import colors from "tailwindcss/colors";
import {
    appPlugin,
    gridAutoFit,
    icons,
} from "./resources/js/Plugins/tailwind/index.ts";
import forms from "@tailwindcss/forms";
import radix from "tailwindcss-radix";
import defaultTheme from "tailwindcss/defaultTheme";

const getColorCssVariables = (colorName) => {
    return Object.keys(colors.red).reduce((obj, shade) => {
        return (obj = {
            ...obj,
            [shade]: `hsl(var(--${colorName}-${shade}) / <alpha-value>)`,
        });
    }, {});
};

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: ["class"],
    safelist: ["dark"],
    prefix: "",

    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.{ts,tsx,vue}",
    ],

    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: "1rem",
                sm: "1rem",
                lg: "2rem",
                xl: "2rem",
                "2xl": "3rem",
            },
            screens: {
                "2xl": "1400px",
            },
        },
        fontFamily: {
            sans: ["Poppins", ...defaultTheme.fontFamily.sans],
            "alegreya-sans-sc": [
                "Alegreya Sans SC",
                ...defaultTheme.fontFamily.sans,
            ],
        },
        extend: {
            colors: {
                border: "hsl(var(--border))",
                input: "hsl(var(--input))",
                ring: "hsl(var(--ring))",
                background: "hsl(var(--background))",
                foreground: "hsl(var(--foreground))",
                primary: {
                    DEFAULT: "hsl(var(--primary))",
                    foreground: "hsl(var(--primary-foreground))",
                    ...getColorCssVariables("primary"),
                },
                secondary: {
                    DEFAULT: "hsl(var(--secondary))",
                    foreground: "hsl(var(--secondary-foreground))",
                    ...getColorCssVariables("secondary"),
                },
                destructive: {
                    DEFAULT: "hsl(var(--destructive))",
                    foreground: "hsl(var(--destructive-foreground))",
                },
                muted: {
                    DEFAULT: "hsl(var(--muted))",
                    foreground: "hsl(var(--muted-foreground))",
                },
                accent: {
                    DEFAULT: "hsl(var(--accent))",
                    foreground: "hsl(var(--accent-foreground))",
                },
                popover: {
                    DEFAULT: "hsl(var(--popover))",
                    foreground: "hsl(var(--popover-foreground))",
                },
                card: {
                    DEFAULT: "hsl(var(--card))",
                    foreground: "hsl(var(--card-foreground))",
                },
            },
            borderRadius: {
                xl: "calc(var(--radius) + 4px)",
                lg: "var(--radius)",
                md: "calc(var(--radius) - 2px)",
                sm: "calc(var(--radius) - 4px)",
            },
            keyframes: {
                "accordion-down": {
                    from: { height: 0 },
                    to: { height: "var(--radix-accordion-content-height)" },
                },
                "accordion-up": {
                    from: { height: "var(--radix-accordion-content-height)" },
                    to: { height: 0 },
                },
                "collapsible-down": {
                    from: { height: 0 },
                    to: { height: "var(--radix-collapsible-content-height)" },
                },
                "collapsible-up": {
                    from: { height: "var(--radix-collapsible-content-height)" },
                    to: { height: 0 },
                },
            },
            animation: {
                "accordion-down": "accordion-down 0.2s ease-out",
                "accordion-up": "accordion-up 0.2s ease-out",
                "collapsible-down": "collapsible-down 0.2s ease-in-out",
                "collapsible-up": "collapsible-up 0.2s ease-in-out",
            },
        },
    },
    plugins: [
        animate,
        forms({ strategy: "class" }),
        appPlugin,
        gridAutoFit,
        icons,
        radix,
    ],
};
