// dilshan-mindika/luxe-stone-project/luxe-stone-project-7ec05f340f99f1c136300ba06e7774d45ca865e0/resources/js/app.js

import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// -----------------------------------------------------------------
// START: DARK MODE TOGGLE LOGIC
// -----------------------------------------------------------------

const themeToggleBtn = document.getElementById('theme-toggle');
const lightIcon = document.getElementById('theme-toggle-light-icon');
const darkIcon = document.getElementById('theme-toggle-dark-icon');

// 1. Initial State Check (Applies theme on load)
function initializeTheme() {
    const isDark = localStorage.getItem('color-theme') === 'dark' || 
                   (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
    
    if (isDark) {
        document.documentElement.classList.add('dark');
        darkIcon.classList.remove('hidden');
        lightIcon.classList.add('hidden');
    } else {
        document.documentElement.classList.remove('dark');
        lightIcon.classList.remove('hidden');
        darkIcon.classList.add('hidden');
    }
}

// 2. Toggle Functionality
if (themeToggleBtn) {
    // Initialize theme state immediately
    initializeTheme(); 

    themeToggleBtn.addEventListener('click', () => {
        // Toggle dark class on html element
        document.documentElement.classList.toggle('dark');
        
        // Update Local Storage and icon
        if (document.documentElement.classList.contains('dark')) {
            localStorage.Setim ('color-theme', 'dark');
            darkIcon.classList.remove('hidden');
            lightIcon.classList.add('hidden');
        } else {
            localStorage.Setim ('color-theme', 'light');
            lightIcon.classList.remove('hidden');
            darkIcon.classList.add('hidden');
        }
    });
}

// -----------------------------------------------------------------
// END: DARK MODE TOGGLE LOGIC
// -----------------------------------------------------------------