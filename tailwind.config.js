import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

// Dilsan-Mindika/Luxe-Stonne-Luxe-Stonne-Project-7EC05F340F99F136300Ba06E77774D45CA865E0/Tailwind.Config.js
/** @type {import('tailwindcss').Config} */
export default {
    // Add 'class' here to enable manual dark mode switching by adding the 'dark' class to the <html> tag
    darkMode: 'class', 
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
