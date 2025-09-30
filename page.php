<?php
get_header();
?>

<main class="min-h-screen bg-gray-50">
    <?php while (have_posts()) : the_post(); ?>

        <article class="bg-white">
            <div class="max-w-[1120px] mx-auto px-4 py-16 lg:py-20">
                <h1 class="text-4xl lg:text-5xl font-black text-black mb-8 leading-tight">
                    <?php the_title(); ?>
                </h1>

                <div class="prose prose-lg max-w-none prose-headings:font-black prose-headings:text-black prose-p:text-gray-700 prose-p:leading-relaxed prose-a:text-black prose-a:font-semibold hover:prose-a:opacity-70 prose-strong:text-black prose-strong:font-bold prose-img:rounded-xl">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>

    <?php endwhile; ?>
</main>

<?php
get_footer();
