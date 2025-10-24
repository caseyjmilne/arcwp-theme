<?php
get_header();
?>

<main class="min-h-screen flex items-center justify-center">
    <div class="text-center px-4 py-20">
        <div class="mb-8">
            <svg class="w-24 h-24 mx-auto text-slate-900 dark:text-slate-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <h1 class="text-4xl lg:text-5xl font-black text-slate-900 dark:text-slate-50 mb-4 leading-tight">
            You seem lost
        </h1>

        <p class="text-lg text-slate-900 dark:text-slate-50 mb-8 max-w-md mx-auto">
            This page doesn't have a specific template. It's probably best to head back home or check out our other pages.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo home_url('/'); ?>" class="inline-flex items-center justify-center bg-orange-600 text-slate-50 px-8 py-4 rounded-md text-sm font-medium hover:bg-orange-700 transition-colors">
                Back to Home
            </a>
            <a href="<?php echo home_url('/blog'); ?>" class="inline-flex items-center justify-center border-2 border-slate-900 dark:border-slate-50 text-slate-900 dark:text-slate-50 px-8 py-4 rounded-md text-sm font-medium hover:bg-slate-900 dark:hover:bg-slate-50 hover:text-slate-50 dark:hover:text-slate-900 transition-colors">
                View Blog
            </a>
        </div>
    </div>
</main>

<?php
get_footer();