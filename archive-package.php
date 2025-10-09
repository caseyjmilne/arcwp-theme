<?php get_header(); ?>

<div class="max-w-[1120px] mx-auto px-4 py-8">

    <header class="mb-16">
        <h1 class="text-4xl font-bold mb-2">ARC Suite Packages</h1>
        <p class="text-gray-400 max-w-lg font-semibold">Most of our packages are free. It's a trap to make you fall in love with them and then buy licenses later.</p>
    </header>

    <?php if (have_posts()) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            <?php while (have_posts()) : the_post(); ?>
                <div class="rounded-lg bg-zinc-900 shadow-md shadow-zinc-500/50 overflow-hidden hover:shadow-lg transition-shadow">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" class="block aspect-video overflow-hidden">
                            <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300')); ?>
                        </a>
                    <?php endif; ?>

                    <div class="p-6">
                        <h2 class="text-2xl font-semibold mb-2">
                            <a href="<?php the_permalink(); ?>" class="hover:text-sky-400">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <?php if (get_field('version')) : ?>
                            <p class="text-gray-400 mb-2">
                                Version <?php echo esc_html(get_field('version')); ?>
                            </p>
                        <?php endif; ?>

                        <?php if (get_field('latest')) :
                            $file = get_field('latest'); ?>
                            <a href="<?php echo esc_url($file['url']); ?>"
                               class="inline-block mt-4 bg-sky-800 text-gray-100 px-4 py-2 rounded hover:bg-sky-900 transition-colors">
                                Download Latest
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="mt-8">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>
        <p class="text-gray-400">No packages found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
