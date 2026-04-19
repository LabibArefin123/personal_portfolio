import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

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
                darkBg: "#020617",
                darkCard: "rgba(15, 23, 42, 0.6)",
                primaryGlow: "#6366f1",
                secondaryGlow: "#06b6d4",
            },

            boxShadow: {
                glow: "0 20px 40px rgba(99, 102, 241, 0.2)",
            },

            backdropBlur: {
                xs: "12px",
            },
        },
    },

    plugins: [forms],
};
