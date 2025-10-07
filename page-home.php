<?php get_header(); ?>

<main class="min-h-screen">
    <!-- Hero Section -->
    <section class="py-24 lg:py-40">
        <div class="max-w-[1120px] mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-16 lg:gap-20 items-center">
                <!-- Left Content -->
                <div>
                    <h1 class="text-6xl lg:text-7xl font-black text-black mb-8 leading-tight tracking-tight">
                        Build WordPress Sites That Scale
                    </h1>
                    <p class="text-xl text-gray-600 mb-10 leading-relaxed">
                        From rapid prototyping to enterprise-grade applications. ARC Suite gives you the professional tools and frameworks to build exceptional WordPress experiences.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 mb-12">
                        <a href="#" class="group inline-flex items-center justify-center bg-black text-white px-10 py-5 rounded-full text-base font-bold hover:bg-gray-800 transition-all shadow-xl hover:shadow-2xl hover:scale-105">
                            Start Building Free
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="#" class="inline-flex items-center justify-center text-black px-10 py-5 text-base font-semibold hover:text-gray-600 transition-colors">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Watch Demo
                        </a>
                    </div>

                    <!-- Social Proof -->
                    <div class="flex items-center gap-6 pt-6 border-t border-gray-200">
                        <div>
                            <div class="flex items-center gap-1 mb-1">
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="text-sm font-bold text-black">4.9/5</span>
                            </div>
                            <p class="text-sm text-gray-500">Trusted by 50,000+ developers</p>
                        </div>
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
                                <p class="text-white/40 text-sm font-medium">Product Screenshot<br/>900 x 1200px</p>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Stats Cards -->
                    <div class="absolute -left-4 top-1/4 bg-white rounded-xl shadow-xl p-4 border border-gray-100">
                        <div class="text-3xl font-black text-black mb-1">10x</div>
                        <div class="text-xs text-gray-500 font-medium">Faster builds</div>
                    </div>

                    <div class="absolute -right-4 bottom-1/4 bg-white rounded-xl shadow-xl p-4 border border-gray-100">
                        <div class="text-3xl font-black text-black mb-1">99%</div>
                        <div class="text-xs text-gray-500 font-medium">Uptime</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>

<?php
get_footer();