<div class="flex border border-orange-600 rounded-lg overflow-hidden">
    <!-- Light mode button -->
    <button id="light-mode-btn" type="button" class="p-1 transition-colors focus:outline-none" aria-label="Switch to light mode">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
        </svg>
    </button>

    <!-- Dark mode button -->
    <button id="dark-mode-btn" type="button" class="p-1 transition-colors focus:outline-none" aria-label="Switch to dark mode">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
        </svg>
    </button>
</div>

<script>
// Theme toggle functionality
(function() {
    const lightBtn = document.getElementById('light-mode-btn');
    const darkBtn = document.getElementById('dark-mode-btn');

    // Check for saved theme preference or default to 'light'
    const currentTheme = localStorage.getItem('theme') || 'light';

    // Function to update button states
    function updateButtonStates(theme) {
        if (theme === 'dark') {
            // Light mode button (inactive in dark mode)
            lightBtn.classList.remove('bg-orange-600', 'text-white');
            lightBtn.classList.add('text-slate-50');
            // Dark mode button (active in dark mode)
            darkBtn.classList.remove('text-slate-900');
            darkBtn.classList.add('bg-orange-600', 'text-white');
        } else {
            // Dark mode button (inactive in light mode)
            darkBtn.classList.remove('bg-orange-600', 'text-white');
            darkBtn.classList.add('text-slate-900');
            // Light mode button (active in light mode)
            lightBtn.classList.remove('text-slate-50');
            lightBtn.classList.add('bg-orange-600', 'text-white');
        }
    }

    // Set initial theme
    if (currentTheme === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
    updateButtonStates(currentTheme);

    // Light mode button click
    lightBtn.addEventListener('click', function() {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
        updateButtonStates('light');
    });

    // Dark mode button click
    darkBtn.addEventListener('click', function() {
        document.documentElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');
        updateButtonStates('dark');
    });
})();
</script>
