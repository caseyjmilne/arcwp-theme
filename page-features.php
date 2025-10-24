<?php
/*
Template Name: Features
*/

get_header();
?>

<main class="min-h-screen">
    <!-- Hero Section -->
    <section class="py-20 lg:py-32">
        <div class="max-w-[1120px] mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <!-- Left Content -->
                <div>
                    <div class="inline-block text-slate-900 dark:text-slate-50 text-xs font-bold px-3 py-1 rounded-full mb-6 border border-slate-900 dark:border-slate-50">
                        ARC SUITE
                    </div>
                    <h1 class="text-5xl lg:text-6xl font-black text-slate-900 dark:text-slate-50 mb-6 leading-tight">
                        The Modern WordPress Framework
                    </h1>
                    <p class="text-lg text-slate-900 dark:text-slate-50 mb-8 leading-relaxed">
                        Build faster, scale better, and deliver exceptional WordPress experiences with our comprehensive suite of professional development tools and frameworks.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="<?php echo site_url('packages'); ?>" class="inline-flex items-center justify-center bg-orange-600 text-slate-50 px-8 py-4 rounded-md text-sm font-medium hover:bg-orange-700 transition-colors">
                            Get Started Free
                        </a>
                        <a href="<?php echo site_url('docs'); ?>" class="inline-flex items-center justify-center border-2 border-slate-900 dark:border-slate-50 text-slate-900 dark:text-slate-50 px-8 py-4 rounded-md text-sm font-medium hover:bg-slate-900 dark:hover:bg-slate-50 hover:text-slate-50 dark:hover:text-slate-900 transition-colors">
                            View Documentation
                        </a>
                    </div>
                    <div class="mt-12 flex items-center gap-8">
                        <div>
                            <div class="text-3xl font-black text-slate-900 dark:text-slate-50">24/7</div>
                            <div class="text-sm text-slate-900 dark:text-slate-50">Support</div>
                        </div>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="relative">
                    <div class="aspect-[4/3] bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg overflow-hidden shadow-2xl">
                        <div class="w-full h-full flex items-center justify-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/planner.png" width="1795" height="1359">
                        </div>
                    </div>
                    <!-- Decorative Elements -->
                    <div class="absolute -bottom-6 -right-6 w-32 h-32 opacity-10 rounded-lg -z-10 bg-slate-900 dark:bg-slate-50"></div>
                    <div class="absolute -top-6 -left-6 w-24 h-24 border-4 border-slate-900 dark:border-slate-50 opacity-20 rounded-lg -z-10"></div>
                </div>
            </div>
        </div>
    </section>


    <!-- ============================================ -->
    <!-- Feature Focuses Section -->
    <!-- ============================================ -->

    <section class="py-20 lg:py-32">
        <div class="max-w-[1120px] mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12 lg:gap-16">

                <!-- Feature 1: Speed -->
                <div>
                    <div class="text-7xl lg:text-8xl font-black text-slate-900 dark:text-slate-50 mb-4 leading-none">
                        01
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-slate-50 mb-4">
                        Lightning Fast Performance
                    </h3>
                    <p class="text-slate-900 dark:text-slate-50 leading-relaxed">
                        Optimized code and smart caching deliver blazing fast load times. Your users will experience instant page loads and seamless interactions.
                    </p>
                </div>

                <!-- Feature 2: Scale -->
                <div>
                    <div class="text-7xl lg:text-8xl font-black text-slate-900 dark:text-slate-50 mb-4 leading-none">
                        02
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-slate-50 mb-4">
                        Built to Scale
                    </h3>
                    <p class="text-slate-900 dark:text-slate-50 leading-relaxed">
                        From small blogs to enterprise applications, our architecture grows with your needs. Handle millions of requests without breaking a sweat.
                    </p>
                </div>

                <!-- Feature 3: Developer Experience -->
                <div>
                    <div class="text-7xl lg:text-8xl font-black text-slate-900 dark:text-slate-50 mb-4 leading-none">
                        03
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-slate-50 mb-4">
                        Developer First
                    </h3>
                    <p class="text-slate-900 dark:text-slate-50 leading-relaxed">
                        Clean APIs, comprehensive documentation, and intuitive tooling. Spend less time fighting the framework and more time building features.
                    </p>
                </div>

            </div>
        </div>
    </section>


    <!-- ============================================ -->
    <!-- CTA Section - Midday Style (Full Width) -->
    <!-- ============================================ -->

    <section class="relative overflow-hidden">
        <!-- Gradient mesh background -->
        <div class="absolute inset-0 bg-gradient-to-br from-black via-gray-900 to-black"></div>

        <!-- Animated gradient orbs -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-purple-600/20 to-blue-600/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-gradient-to-tr from-green-600/20 to-cyan-600/20 rounded-full blur-3xl"></div>

        <div class="relative max-w-[1120px] mx-auto px-4 py-20 lg:py-32">
            <div class="max-w-3xl mx-auto text-center">
                <!-- Small badge -->
                <div class="inline-flex items-center gap-2 backdrop-blur-sm border border-slate-900/50 dark:border-slate-50/50 rounded-full px-4 py-2 mb-8">
                    <div class="w-2 h-2 bg-orange-600 rounded-full animate-pulse"></div>
                    <span class="text-sm text-slate-50 font-medium">Ready when you are</span>
                </div>

                <h2 class="text-4xl lg:text-6xl font-black text-slate-50 mb-6 leading-tight">
                    Stress-free by<br/>ARC Suite
                </h2>

                <p class="text-xl text-slate-50 mb-10 leading-relaxed">
                    No more wrestling with complex code. Just smooth, powerful WordPress development that actually makes sense.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="<?php echo site_url('packages'); ?>" class="group inline-flex items-center justify-center text-slate-50 px-8 py-4 rounded-full text-base font-bold border border-slate-50 hover:bg-orange-600 hover:border-orange-600 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                        Get Started Free
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </section>


</main>

<?php
get_footer();