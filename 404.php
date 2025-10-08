<?php
get_header();
?>

<main class="min-h-screen flex items-center justify-center">
    <div class="text-center px-4 py-20">
        <div class="mb-8">
            <div class="text-8xl font-black text-gray-400 mb-4">404</div>
            <svg class="w-20 h-20 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <h1 class="text-4xl lg:text-5xl font-black text-gray-400 mb-4 leading-tight">
            Page Not Found
        </h1>

        <p class="text-lg text-gray-400 mb-8 max-w-md mx-auto">
            The page you're looking for doesn't exist or has been moved. Let's get you back on track.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
            <a href="<?php echo home_url('/'); ?>" class="inline-flex items-center justify-center bg-black text-white px-8 py-4 rounded-md text-sm font-medium hover:bg-gray-800 transition-colors">
                Back to Home
            </a>
            <a href="<?php echo home_url('/blog'); ?>" class="inline-flex items-center justify-center border-2 border-gray-400 text-gray-400 px-8 py-4 rounded-md text-sm font-medium hover:bg-gray-400 hover:text-white transition-colors">
                View Blog
            </a>
        </div>

        <!-- Search Form -->
        <div class="max-w-md mx-auto">
            <p class="text-sm text-gray-500 mb-4">Or try searching:</p>
            <form role="search" method="get" action="<?php echo home_url('/'); ?>" class="flex gap-2">
                <input
                    type="search"
                    name="s"
                    placeholder="Search..."
                    class="flex-1 px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent"
                    value="<?php echo get_search_query(); ?>"
                />
                <button type="submit" class="bg-black text-white px-6 py-3 rounded-md hover:bg-gray-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</main>

<?php
get_footer();