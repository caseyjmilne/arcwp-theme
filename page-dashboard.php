<?php
/**
 * Template Name: Dashboard Page
 */

// Redirect to account page if not logged in
if (!is_user_logged_in()) {
    wp_redirect(site_url('/account/'));
    exit;
}

get_header(); ?>

<main class="min-h-screen">

    <section class="py-24 lg:py-32">
        <div class="max-w-[1120px] mx-auto px-4">

            <div class="mb-12">
                <h1 class="text-4xl lg:text-5xl font-black text-slate-900 dark:text-slate-50 mb-4">
                    Dashboard
                </h1>
                <p class="text-lg text-slate-900 dark:text-slate-50 leading-relaxed">
                    Welcome back, <strong><?php echo wp_get_current_user()->display_name; ?></strong>
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

                <!-- User Info Card -->
                <div class="border-2 border-slate-900 dark:border-slate-50 rounded-xl p-6">
                    <h2 class="text-xl font-bold text-slate-900 dark:text-slate-50 mb-4">Your Account</h2>
                    <div class="space-y-2 text-sm font-medium">
                        <p class="text-slate-900 dark:text-slate-50">
                            <span class="font-semibold">Username:</span>
                            <?php echo wp_get_current_user()->user_login; ?>
                        </p>
                        <p class="text-slate-900 dark:text-slate-50">
                            <span class="font-semibold">Email:</span>
                            <?php echo wp_get_current_user()->user_email; ?>
                        </p>
                        <p class="text-slate-900 dark:text-slate-50">
                            <span class="font-semibold">Role:</span>
                            <?php echo implode(', ', wp_get_current_user()->roles); ?>
                        </p>
                    </div>
                </div>

                <!-- Quick Links Card -->
                <div class="border-2 border-slate-900 dark:border-slate-50 rounded-xl p-6">
                    <h2 class="text-xl font-bold text-slate-900 dark:text-slate-50 mb-4">Quick Links</h2>
                    <div class="space-y-3">
                        <?php if (current_user_can('manage_options')) : ?>
                        <a href="<?php echo admin_url(); ?>" class="block text-orange-600 hover:opacity-70 transition-opacity font-semibold text-sm">
                            → WordPress Admin Panel
                        </a>
                        <?php endif; ?>
                        <a href="<?php echo admin_url('profile.php'); ?>" class="block text-orange-600 hover:opacity-70 transition-opacity text-sm font-medium">
                            → Edit Profile
                        </a>
                        <a href="<?php echo site_url('/packages/'); ?>" class="block text-orange-600 hover:opacity-70 transition-opacity text-sm font-medium">
                            → View Packages
                        </a>
                    </div>
                </div>

                <!-- Actions Card -->
                <div class="border-2 border-slate-900 dark:border-slate-50 rounded-xl p-6">
                    <h2 class="text-xl font-bold text-slate-900 dark:text-slate-50 mb-4">Actions</h2>
                    <div class="space-y-3">
                        <a href="<?php echo wp_logout_url(home_url()); ?>" class="inline-flex items-center justify-center border-2 border-slate-900 dark:border-slate-50 text-slate-900 dark:text-slate-50 px-6 py-3 rounded-md text-sm font-medium hover:bg-slate-900 dark:hover:bg-slate-50 hover:text-slate-50 dark:hover:text-slate-900 transition-colors w-full">
                            Log Out
                        </a>
                    </div>
                </div>

            </div>

            <!-- Recent Activity or Content Section -->
            <div class="border-2 border-slate-900 dark:border-slate-50 rounded-xl p-6">
                <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 dark:text-slate-50 mb-4 leading-snug">Welcome to ARC Suite</h2>
                <p class="text-base text-slate-900 dark:text-slate-50 mb-6 leading-relaxed">
                    You're now logged into your account. From here you can access your packages, manage your profile, and explore the ARC Suite features.
                </p>
                <a href="<?php echo site_url('/packages/'); ?>" class="inline-flex items-center justify-center bg-orange-600 text-slate-50 px-8 py-4 rounded-md text-sm font-medium hover:bg-orange-700 transition-colors">
                    Explore Packages
                </a>
            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>
