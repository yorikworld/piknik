<?php
$paged = get_query_var('page') ? get_query_var('page') : 1;
get_header(); ?>
<!-- content-area -->
<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">

                        <?php while (have_posts()) : the_post(); ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="entry-header">
                                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

                                    <div class="entry-meta">
                                        <?php philips_posted_on(); ?>
                                    </div><!-- .entry-meta -->
                                </header><!-- .entry-header -->

                                <div class="entry-content">
                                    <?php the_post_thumbnail('medium',
                                        array('alt' => get_the_title(), 'class' => "pull-right",)); ?>
                                    <?php the_content(); ?>
                                    <span><b>Состав:</b></span>
                                    <div class="composition">
                                        <?php $composition = get_field('composition');
                                        if ($composition) {
                                            foreach ($composition as $item) {
                                                echo '- ' . $item['discription'] . '<br>';
                                            }
                                        } ?>
                                    </div>
                                    <div class="price">
                                        
                                    </div>
                                    <?php
                                    wp_link_pages(array(
                                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'philips'),
                                        'after'  => '</div>',
                                    ));
                                    ?>
                                </div><!-- .entry-content -->

                                <footer class="entry-footer">
                                    <?php philips_entry_footer(); ?>
                                </footer><!-- .entry-footer -->
                            </article><!-- #post-## -->

                            <!--                            --><?php //get_template_part( 'template-parts/content', 'single' ); ?>

                            <?php the_post_navigation(); ?>

                            <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;
                            ?>

                        <?php endwhile; // end of the loop. ?>

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div><!-- content-area -->
<?php get_footer(); ?>
