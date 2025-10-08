<?php get_header(); ?>

<main class="min-h-screen">
    <!-- Hero Section -->
    <section class="py-24 lg:py-32">
        <div class="max-w-[1120px] mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-16 lg:gap-20 items-center">
                <!-- Left Content -->
                <div>
                    <h1 class="text-6xl lg:text-6xl font-black text-gray-500 mb-8">
                        Make WordPress Sites That Scale
                    </h1>
                    <p class="text-xl text-gray-600 mb-10 leading-relaxed">
                        From rapid prototyping to enterprise-grade applications. ARC Suite gives you the professional tools and frameworks to build exceptional WordPress experiences.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 mb-12">
                        <a href="<?php echo site_url('packages'); ?>" class="group inline-flex items-center justify-center bg-sky-800 text-white px-10 py-5 rounded-full text-base font-bold hover:bg-sky-900 transition-all shadow-xl hover:shadow-2xl hover:scale-105">
                            Start Building Free
                        </a>
                        <a href="#learn-more" class="inline-flex items-center justify-center text-gray-400 px-10 py-5 text-base font-semibold hover:text-gray-600 transition-colors">
                            Learn More
                        </a>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="relative lg:ml-8">
                    <div class="aspect-[3/4] bg-gradient-to-br from-gray-900 to-black rounded-2xl overflow-hidden shadow-2xl">
                        <div class="w-full h-full flex items-center justify-center p-12">
                            <div class="text-center">
                                <svg class="w-40 h-40 mx-auto text-white/20 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Stats Cards -->
                    <div class="absolute -left-4 top-1/4 bg-zinc-800 rounded-xl shadow-xl p-4">
                        <div class="text-3xl font-black text-gray-400 mb-1">10x</div>
                        <div class="text-xs text-gray-500 font-medium">Faster builds</div>
                    </div>

                    <div class="absolute -right-4 bottom-1/4 bg-zinc-800 rounded-xl shadow-xl p-4">
                        <div class="text-3xl font-black text-gray-400 mb-1">99%</div>
                        <div class="text-xs text-gray-500 font-medium">Performance</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>

<?php
get_footer();