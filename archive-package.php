<?php get_header(); ?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold mb-8"><?php post_type_archive_title(); ?></h1>

    <?php if (have_posts()) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php while (have_posts()) : the_post(); ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" class="block aspect-video overflow-hidden">
                            <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300')); ?>
                        </a>
                    <?php endif; ?>

                    <div class="p-6">
                        <h2 class="text-2xl font-semibold mb-4">
                            <a href="<?php the_permalink(); ?>" class="hover:text-blue-600">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <?php if (get_field('name')) : ?>
                            <p class="text-gray-700 mb-2">
                                <strong>Name:</strong> <?php echo esc_html(get_field('name')); ?>
                            </p>
                        <?php endif; ?>

                        <?php if (get_field('version')) : ?>
                            <p class="text-gray-700 mb-2">
                                <strong>Version:</strong> <?php echo esc_html(get_field('version')); ?>
                            </p>
                        <?php endif; ?>

                        <?php if (get_field('latest')) :
                            $file = get_field('latest'); ?>
                            <a href="<?php echo esc_url($file['url']); ?>"
                               class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">
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
        <p class="text-gray-600">No packages found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
