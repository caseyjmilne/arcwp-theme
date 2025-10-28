<?php get_header(); ?>

<main class="min-h-screen">
    <?php while (have_posts()) : the_post(); ?>

        <article>
            <div class="max-w-[1120px] mx-auto px-4 py-16 lg:py-20">
                
            <h1 class="text-3xl lg:text-5xl font-black text-slate-900 dark:text-slate-50 mb-12 leading-tight">
                    <?php the_title(); ?>
                </h1>

                <div class="prose prose-lg max-w-none
                    prose-headings:font-black prose-headings:text-gray-400
                    prose-h2:text-3xl prose-h2:mt-12 prose-h2:mb-6
                    prose-h3:text-2xl prose-h3:mt-10 prose-h3:mb-4
                    prose-h4:text-xl prose-h4:mt-8 prose-h4:mb-3
                    prose-p:text-gray-400 prose-p:leading-relaxed prose-p:mb-6
                    prose-a:text-gray-400 prose-a:font-semibold hover:prose-a:opacity-70
                    prose-strong:text-gray-400 prose-strong:font-bold
                    prose-img:rounded-xl
                    prose-pre:bg-blue-950 prose-pre:border prose-pre:border-blue-900
                    prose-code:text-blue-100">
                    <?php the_content(); ?>
                </div>

            </div>
        </article>

    <?php endwhile; ?>
</main>

<?php get_footer();
