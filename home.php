<?php
get_header();
?>

<main class="min-h-screen bg-gray-50">
    <!-- Page Header -->
    <section class="py-16 lg:py-20 bg-white border-b border-gray-200">
        <div class="max-w-[1120px] mx-auto px-4">
            <h1 class="text-5xl lg:text-6xl font-black text-black mb-4 leading-tight">
                Blog
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl">
                Insights, tutorials, and updates from the ARC Suite team
            </p>
        </div>
    </section>


    <!-- Blog Posts Grid -->
    <section class="py-16 lg:py-20">
        <div class="max-w-[1120px] mx-auto px-4">
            <?php if (have_posts()) : ?>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <!-- Featured Image -->
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="block aspect-[16/9] overflow-hidden">
                                    <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300')); ?>
                                </a>
                            <?php else : ?>
                                <a href="<?php the_permalink(); ?>" class="block aspect-[16/9] bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </a>
                            <?php endif; ?>

                            <!-- Post Content -->
                            <div class="p-6">
                                <!-- Meta -->
                                <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                                    <time datetime="<?php echo get_the_date('c'); ?>">
                                        <?php echo get_the_date('M j, Y'); ?>
                                    </time>
                                    <?php
                                    $categories = get_the_category();
                                    if (!empty($categories)) :
                                        $category = $categories[0];
                                    ?>
                                        <span class="flex items-center gap-1">
                                            <span class="w-1 h-1 bg-gray-400 rounded-full"></span>
                                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="hover:text-black transition-colors">
                                                <?php echo esc_html($category->name); ?>
                                            </a>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <!-- Title -->
                                <h2 class="text-xl font-bold text-black mb-3 leading-tight">
                                    <a href="<?php the_permalink(); ?>" class="hover:text-gray-700 transition-colors">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <!-- Excerpt -->
                                <p class="text-gray-600 leading-relaxed mb-4">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                </p>

                                <!-- Read More -->
                                <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-sm font-semibold text-black hover:gap-2 transition-all">
                                    Read More
                                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="mt-16">
                    <?php
                    the_posts_pagination(array(
                        'prev_text' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>',
                        'next_text' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>',
                        'class' => 'flex justify-center'
                    ));
                    ?>
                </div>

            <?php else : ?>
                <!-- No Posts Found -->
                <div class="text-center py-20">
                    <svg class="w-24 h-24 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h2 class="text-2xl font-bold text-black mb-3">No posts found</h2>
                    <p class="text-gray-600 mb-6">Check back soon for new content.</p>
                    <a href="<?php echo home_url('/'); ?>" class="inline-flex items-center justify-center bg-black text-white px-6 py-3 rounded-md text-sm font-medium hover:bg-gray-800 transition-colors">
                        Back to Home
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>


</main>

<?php
get_footer();