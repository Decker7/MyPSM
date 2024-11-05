/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require("@tailwindcss/forms"), // Adds form styling utilities
        require("@tailwindcss/aspect-ratio"), // Adds aspect-ratio utilities
        require("daisyui"),
    ],
};
