import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                grape: {
                    50: "#f6f3ff",
                    100: "#efe9fe",
                    200: "#e0d6fe",
                    300: "#cab5fd",
                    350: "#b4198b",
                    400: "#b08bfa",
                    450: "#33527B",
                    500: "#985cf6",
                    550: "#F7F7F8",
                    600: "#8b3aed",
                    700: "#7c28d9",
                    750: "#A5A6A8",
                    800: "#6821b6",
                    850: "#251F70",
                    900: "#561d95",
                    950: "#351065",
                },
                blueberry: {
                    50: "#eff5ff",
                    100: "#dbe8fe",
                    200: "#bfd7fe",
                    300: "#93bbfd",
                    400: "#609afa",
                    500: "#3b82f6",
                    600: "#2570eb",
                    700: "#1d64d8",
                    800: "#1e55af",
                    900: "#1e478a",
                    950: "#172e54",
                },
                raspberry: {
                    50: "#fef4ff",
                    100: "#fce8ff",
                    200: "#f8d0fe",
                    300: "#f1abfc",
                    400: "#e879f9",
                    500: "#d946ef",
                    600: "#bc26d3",
                    700: "#9c1caf",
                    800: "#80198f",
                    900: "#691a75",
                    950: "#44044e",
                },
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
