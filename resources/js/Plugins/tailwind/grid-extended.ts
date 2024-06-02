import plugin from "tailwindcss/plugin";

export const gridAutoFit = plugin(
    function ({ matchUtilities, theme }) {
        matchUtilities(
            {
                "grid-cols-auto-fit": (value) => ({
                    gridTemplateColumns: `repeat(auto-fit, minmax(min(${value},100%), 1fr))`,
                }),
                "grid-cols-auto-fill": (value) => ({
                    gridTemplateColumns: `repeat(auto-fill, minmax(min(${value},100%), 1fr))`,
                }),
                "grid-rows-auto-fit": (value) => ({
                    gridTemplateRows: `repeat(auto-fit, minmax(min(${value},100%), 1fr))`,
                }),
                "grid-rows-auto-fill": (value) => ({
                    gridTemplateRows: `repeat(auto-fill, minmax(min(${value},100%), 1fr))`,
                }),
            },
            { values: theme("gridAutoFit") }
        );
    },
    {
        theme: {
            gridAutoFit: {
                DEFAULT: "16rem",
                xs: "12rem",
                sm: "14rem",
                md: "16rem",
                lg: "18rem",
                xl: "20rem",
            },
        },
    }
);
