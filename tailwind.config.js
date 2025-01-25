import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Montserrat", ...defaultTheme.fontFamily.sans],
                serif: ["Gelasio", ...defaultTheme.fontFamily.serif],
                logo: ["Alfa Slab One", ...defaultTheme.fontFamily.serif],
                title: ["Gelasio", ...defaultTheme.fontFamily.serif],
            },
            dropShadow: {
                strong: "0 20px 25px rgba(0, 0, 0, 0.5)",
                glow: "0 0px 10px rgba(255,255,255, 0.5)",
            },
        },
    },

    plugins: [forms],
};
