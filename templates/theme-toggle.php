<button
    id="theme-toggle"
    type="button"
    class="relative inline-flex h-8 w-14 items-center rounded-full border border-slate-200 bg-slate-100 transition-colors hover:bg-slate-200 dark:border-slate-700 dark:bg-slate-800 dark:hover:bg-slate-700 focus:outline-none"
    aria-label="Toggle theme"
>
    <span
        id="theme-thumb"
        class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-orange-600 shadow-sm transition-transform duration-200 ease-in-out translate-x-1"
    >
        <svg id="theme-icon-moon" class="h-3.5 w-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
        </svg>
        <svg id="theme-icon-sun" class="h-3.5 w-3.5 text-white hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
    </span>
</button>

<script>
// Theme toggle functionality
(function() {
    const toggleBtn = document.getElementById('theme-toggle');
    const thumb = document.getElementById('theme-thumb');
    const moonIcon = document.getElementById('theme-icon-moon');
    const sunIcon = document.getElementById('theme-icon-sun');

    // Check for saved theme preference or system preference
    const savedTheme = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    let currentTheme = savedTheme || (prefersDark ? 'dark' : 'light');

    // Function to update theme UI
    function updateThemeUI(theme) {
        if (theme === 'dark') {
            // Move thumb to right and show sun icon
            thumb.classList.remove('translate-x-1');
            thumb.classList.add('translate-x-7');
            moonIcon.classList.add('hidden');
            sunIcon.classList.remove('hidden');
            document.documentElement.classList.add('dark');
        } else {
            // Move thumb to left and show moon icon
            thumb.classList.remove('translate-x-7');
            thumb.classList.add('translate-x-1');
            moonIcon.classList.remove('hidden');
            sunIcon.classList.add('hidden');
            document.documentElement.classList.remove('dark');
        }
    }

    // Set initial theme
    updateThemeUI(currentTheme);

    // Toggle theme on click
    toggleBtn.addEventListener('click', function() {
        currentTheme = currentTheme === 'light' ? 'dark' : 'light';
        localStorage.setItem('theme', currentTheme);
        updateThemeUI(currentTheme);
    });
})();
</script>
