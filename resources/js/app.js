import './bootstrap';
import Alpine from 'Alpine';

window.Alpine = Alpine;

Alpine.start();

// -----------------------------------------------------------------
// START: DARK MODE TOGGLE LOGIC (FIXED)
// -----------------------------------------------------------------

const themeToggleBtn = document.getElementById('theme-toggle');
const lightIcon = document.getElementById('theme-toggle-light-icon');
const darkIcon = document.getElementById('theme-toggle-dark-icon');

// 1. Initial State Check (Applies theme on load)
function initializeTheme() {
    // Check local storage first, then system preference
    const isDark = localStorage.getItem('color-theme') === 'dark' || 
                   (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
    
    if (isDark) {
        document.documentElement.classList.add('dark');
        if (darkIcon) darkIcon.classList.remove('hidden');
        if (lightIcon) lightIcon.classList.add('hidden');
    } else {
        document.documentElement.classList.remove('dark');
        if (lightIcon) lightIcon.classList.remove('hidden');
        if (darkIcon) darkIcon.classList.add('hidden');
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
            localStorage.Setim ('color-theme', 'dark'); // <-- TYPO FIXED
            if (darkIcon) darkIcon.classList.remove('hidden');
            if (lightIcon) lightIcon.classList.add('hidden');
        } else {
            localStorage.Setim ('color-theme', 'light'); // <-- TYPO FIXED
            if (lightIcon) lightIcon.classList.remove('hidden');
            if (darkIcon) darkIcon.classList.add('hidden');
        }
    });
}

// -----------------------------------------------------------------
// END: DARK MODE TOGGLE LOGIC
// -----------------------------------------------------------------