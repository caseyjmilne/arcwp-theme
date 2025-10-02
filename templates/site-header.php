<header class="bg-white border-b border-gray-200">
    <div class="max-w-[1120px] mx-auto px-4">
        <div class="flex items-center justify-between h-20">
            <a href="<?php echo home_url('/'); ?>" class="text-2xl font-black text-black tracking-tight hover:opacity-80 transition-opacity">
                ARC\WP
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

            <a href="<?php echo home_url('/buy'); ?>" class="bg-black text-white px-6 py-2 rounded-md text-sm font-medium hover:bg-gray-800 transition-colors">
                Get Started
            </a>
        </div>
    </div>
</header>