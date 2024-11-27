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
                'scroll-auto': 'scrollAuto 20s linear infinite',
              },
              keyframes: {
                scrollAuto: {
                  '0%': { transform: 'translateX(0)' },
                  '100%': { transform: 'translateX(-100%)' },
                },
              },
        },
    },

    plugins: [forms],
    
};
