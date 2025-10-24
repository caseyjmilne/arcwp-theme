import React, { useState, useEffect } from 'react';
import { Sun, Moon } from 'lucide-react';

const ThemeToggle = () => {
  const [theme, setTheme] = useState('light');

  useEffect(() => {
    // Check for saved theme preference or system preference
    const savedTheme = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
      setTheme('dark');
      document.documentElement.classList.add('dark');
    }
  }, []);

  const handleThemeChange = (newTheme) => {
    setTheme(newTheme);
    
    if (newTheme === 'dark') {
      document.documentElement.classList.add('dark');
      localStorage.setItem('theme', 'dark');
    } else {
      document.documentElement.classList.remove('dark');
      localStorage.setItem('theme', 'light');
    }
  };

  return (
    <button
      onClick={() => handleThemeChange(theme === 'light' ? 'dark' : 'light')}
      className="relative inline-flex h-8 w-14 items-center rounded-full border border-slate-200 bg-slate-100 transition-colors hover:bg-slate-200 dark:border-slate-700 dark:bg-slate-800 dark:hover:bg-slate-700"
      aria-label="Toggle theme"
    >
      <span
        className={`inline-flex h-6 w-6 items-center justify-center rounded-full bg-orange-600 shadow-sm transition-transform ${
          theme === 'dark' ? 'translate-x-7' : 'translate-x-1'
        }`}
      >
        {theme === 'light' ? (
          <Moon className="h-3.5 w-3.5 text-white" />
        ) : (
          <Sun className="h-3.5 w-3.5 text-white" />
        )}
      </span>
    </button>
  );
};

export default ThemeToggle;
