<header class="sticky top-0 z-50 shadow-md shadow-gray-500/50 bg-zinc-950">
    <div class="max-w-[1120px] mx-auto px-4">
        <div class="flex items-center justify-between h-20">
            <a href="<?php echo home_url('/'); ?>" class="font-playfair text-2xl font-semibold text-gray-400 hover:opacity-80 transition-opacity">
                ARC<span class="text-gray-600 ml-1">\</span>WP
            </a>
            <nav class="flex-1 flex justify-center">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'flex gap-8',
                    'fallback_cb' => false,
                ));
                ?>
            </nav>

            <a href="<?php echo home_url('/buy'); ?>" class="bg-sky-800 text-gray-100 px-6 py-2 rounded-md text-sm font-medium hover:bg-sky-900 transition-colors">
                Get Started
            </a>
        </div>
    </div>
</header>