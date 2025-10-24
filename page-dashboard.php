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
                <h1 class="text-4xl lg:text-5xl font-black text-gray-400 mb-4">
                    Dashboard
                </h1>
                <p class="text-xl text-gray-500">
                    Welcome back, <strong><?php echo wp_get_current_user()->display_name; ?></strong>
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

                <!-- User Info Card -->
                <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6">
                    <h2 class="text-xl font-bold text-gray-400 mb-4">Your Account</h2>
                    <div class="space-y-2 text-sm">
                        <p class="text-gray-500">
                            <span class="text-gray-400 font-semibold">Username:</span>
                            <?php echo wp_get_current_user()->user_login; ?>
                        </p>
                        <p class="text-gray-500">
                            <span class="text-gray-400 font-semibold">Email:</span>
                            <?php echo wp_get_current_user()->user_email; ?>
                        </p>
                        <p class="text-gray-500">
                            <span class="text-gray-400 font-semibold">Role:</span>
                            <?php echo implode(', ', wp_get_current_user()->roles); ?>
                        </p>
                    </div>
                </div>

                <!-- Quick Links Card -->
                <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6">
                    <h2 class="text-xl font-bold text-gray-400 mb-4">Quick Links</h2>
                    <div class="space-y-3">
                        <?php if (current_user_can('manage_options')) : ?>
                        <a href="<?php echo admin_url(); ?>" class="block text-sky-400 hover:text-sky-300 transition-colors font-semibold text-sm">
                            → WordPress Admin Panel
                        </a>
                        <?php endif; ?>
                        <a href="<?php echo admin_url('profile.php'); ?>" class="block text-sky-400 hover:text-sky-300 transition-colors text-sm">
                            → Edit Profile
                        </a>
                        <a href="<?php echo site_url('/packages/'); ?>" class="block text-sky-400 hover:text-sky-300 transition-colors text-sm">
                            → View Packages
                        </a>
                    </div>
                </div>

                <!-- Actions Card -->
                <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6">
                    <h2 class="text-xl font-bold text-gray-400 mb-4">Actions</h2>
                    <div class="space-y-3">
                        <a href="<?php echo wp_logout_url(home_url()); ?>" class="inline-flex items-center justify-center bg-zinc-800 text-gray-400 px-6 py-3 rounded-lg text-sm font-semibold hover:bg-zinc-700 transition-colors border border-zinc-700 w-full">
                            Log Out
                        </a>
                    </div>
                </div>

            </div>

            <!-- Recent Activity or Content Section -->
            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6">
                <h2 class="text-2xl font-bold text-gray-400 mb-4">Welcome to ARC Suite</h2>
                <p class="text-gray-500 mb-4">
                    You're now logged into your account. From here you can access your packages, manage your profile, and explore the ARC Suite features.
                </p>
                <a href="<?php echo site_url('/packages/'); ?>" class="inline-flex items-center justify-center bg-sky-800 text-white px-8 py-3 rounded-lg text-sm font-bold hover:bg-sky-900 transition-colors">
                    Explore Packages
                </a>
            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>
