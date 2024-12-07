import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                darkgray: "#2B2B2B",
            },
            animation: {
                'scroll-auto': 'scrollAuto 90s linear infinite',
                appear: "appear 0.3s ease-in-out"
            },
            keyframes: {
                appear: {
                    "0%": {
                        opacity: "0",
                    },
                    "100%": {
                        opacity: "1",
                    },
                },
                scrollAuto: {
                    '0%': { transform: 'translateX(0)' },
                    '100%': { transform: 'translateX(-100%)' },
                }
            },
        },
    },

    plugins: [
        forms,
        require('tailwindcss-motion') // Add the plugin here
    ],
};
