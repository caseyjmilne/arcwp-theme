<?php
get_header();
return;
?>

<main class="min-h-screen">
    <?php while (have_posts()) : the_post(); ?>

        <!-- Package Header -->
        <article>
            <div class="max-w-[1120px] mx-auto px-4 py-16 lg:py-20">
                <div class="grid lg:grid-cols-2 gap-12 items-start">
                    <!-- Featured Image -->
                    <div class="order-2 lg:order-1">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="rounded-xl overflow-hidden">
                                <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
                            </div>
                        <?php else : ?>
                            <div class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl flex items-center justify-center">
                                <svg class="w-32 h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Package Info -->
                    <div class="order-1 lg:order-2">
                        <!-- Version Badge -->
                        <?php
                        $version = get_field('version');
                        if ($version) :
                        ?>
                            <div class="inline-flex items-center gap-2 px-4 py-2 bg-zinc-800 text-gray-400 rounded-full text-sm font-semibold mb-6">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                Version <?php echo esc_html($version); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Title -->
                        <h1 class="text-4xl lg:text-5xl font-black text-gray-400 mb-6 leading-tight">
                            <?php the_title(); ?>
                        </h1>

                        <!-- Excerpt -->
                        <?php if (has_excerpt()) : ?>
                            <p class="text-xl text-gray-400 mb-8 leading-relaxed">
                                <?php the_excerpt(); ?>
                            </p>
                        <?php endif; ?>

                        <!-- Latest File Info -->
                        <?php
                        $version = get_field('version');
                        $latest = get_field('latest');
                        $name = get_field('name');
                        if ($latest && is_array($latest)) :
                        ?>
                            <div class="rounded-lg p-6 mb-8 border border-gray-500">
                                <h3 class="text-lg font-bold text-gray-400 mb-4">Latest Release</h3>
                                <div class="space-y-2 text-sm">
                                    <?php if (!empty($version)) : ?>
                                        <p class="text-gray-400">
                                            <strong>Version:</strong> <?php echo esc_html($version); ?>
                                        </p>
                                    <?php endif; ?>
                                    <?php if (!empty($name)) : ?>
                                        <p class="text-gray-400">
                                            <strong>Name:</strong> <?php echo esc_html($name); ?>
                                        </p>
                                    <?php endif; ?>
                                    <?php if (!empty($latest['filename'])) : ?>
                                        <p class="text-gray-400">
                                            <strong>File:</strong> <?php echo esc_html($latest['filename']); ?>
                                        </p>
                                    <?php endif; ?>
                                    <?php if (!empty($latest['mime_type'])) : ?>
                                        <p class="text-gray-400">
                                            <strong>Type:</strong> <?php echo esc_html($latest['mime_type']); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 mb-8">
                            <?php if ($latest && !empty($latest['url'])) : ?>
                                <a href="<?php echo esc_url($latest['url']); ?>" download class="inline-flex items-center justify-center bg-zinc-800 text-gray-400 px-8 py-4 rounded-md text-sm font-medium hover:bg-gray-800 transition-colors">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Download Latest
                                </a>
                            <?php endif; ?>
                            <a href="<?php echo esc_url(site_url('docs')); ?>" class="inline-flex items-center justify-center border-2 border-black text-gray-400 px-8 py-4 rounded-md text-sm font-medium hover:bg-black hover:text-gray-400 transition-colors">
                                View Documentation
                            </a>
                        </div>

                        <!-- Meta Info -->
                        <div class="flex items-center gap-4 text-sm text-gray-500 pt-8 border-t border-gray-200">
                            <time datetime="<?php echo get_the_date('c'); ?>">
                                Updated <?php echo get_the_date('M j, Y'); ?>
                            </time>
                        </div>
                    </div>
                </div>
            </div>
        </article>


        <!-- Package Content -->
        <article class="border-t border-gray-200">
            <div class="max-w-[1120px] mx-auto px-4 py-12 lg:py-16">
                <div class="prose prose-lg max-w-none prose-headings:font-black prose-headings:text-gray-400 prose-p:text-gray-400 prose-p:leading-relaxed prose-a:text-gray-400 prose-a:font-semibold hover:prose-a:opacity-70 prose-strong:text-gray-400 prose-strong:font-bold prose-img:rounded-xl">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>


        <!-- Related Packages -->
        <?php
        $related_packages = get_posts(array(
            'post_type' => 'package',
            'numberposts' => 3,
            'post__not_in' => array(get_the_ID()),
        ));

        if ($related_packages) :
        ?>
            <section class="py-16 lg:py-20">
                <div class="max-w-[1120px] mx-auto px-4">
                    <h2 class="text-3xl font-black text-gray-400 mb-12">Related Packages</h2>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php foreach ($related_packages as $post) : setup_postdata($post); ?>
                            <article class="group rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                                <!-- Featured Image -->
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>" class="block aspect-[4/3] overflow-hidden">
                                        <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300')); ?>
                                    </a>
                                <?php else : ?>
                                    <a href="<?php the_permalink(); ?>" class="block aspect-[4/3] bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                    </a>
                                <?php endif; ?>

                                <!-- Package Content -->
                                <div class="p-6">
                                    <!-- Version -->
                                    <?php
                                    $related_version = get_field('version');
                                    if ($related_version) :
                                    ?>
                                        <div class="text-xs text-gray-500 mb-2">
                                            v<?php echo esc_html($related_version); ?>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Title -->
                                    <h3 class="text-xl font-bold text-gray-400 mb-3 leading-tight">
                                        <a href="<?php the_permalink(); ?>" class="hover:text-gray-400 transition-colors">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>

                                    <!-- Excerpt -->
                                    <?php if (has_excerpt()) : ?>
                                        <p class="text-gray-400 leading-relaxed mb-4">
                                            <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                                        </p>
                                    <?php endif; ?>

                                    <!-- Learn More -->
                                    <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-sm font-semibold text-gray-400 hover:gap-2 transition-all">
                                        Learn More
                                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

    <?php endwhile; ?>
</main>

<?php
get_footer();
