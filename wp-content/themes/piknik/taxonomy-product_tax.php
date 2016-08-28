<?php
$name = get_term_by('slug', $term, 'product_tax')->name;
get_header(); ?>
<!-- content-area -->
<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <article id="post">
                            <header class="entry-header">
                                <h1 class="entry-title"><?php echo $name; ?></h1>

                            </header>
                            <div class="entry-content">
                                <?php
                                $args = array(
                                    'post_type'   => 'product_menu',
                                    'post_status' => 'publish',
                                    'tax_query'   => array(
                                        array(
                                            'taxonomy' => 'product_tax',
                                            'field'    => 'slug',
                                            'terms'    => $term,
                                        ),
                                    ),
                                );
                                $the_query = new WP_Query($args);

                                // The Loop
                                if ($the_query->have_posts()) {
                                    while ($the_query->have_posts()) {
                                        $the_query->the_post();?>
                                        <div class="col-sm-4 col-md-4 col-lg-3">
                                            <div><?php the_title(); ?></div>
                                        </div>
                                    <?php }
                                    wp_reset_postdata();
                                } else {
                                    // no posts found
                                }
                                ?>
                            </div>
                            <footer class="entry-footer">
                                <?php edit_post_link(esc_html__('Edit', 'philips'), '<span class="edit-link">',
                                    '</span>'); ?>
                            </footer><!-- .entry-footer -->
                        </article>


                    </main>
                </div>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div><!-- content-area -->
<?php get_footer(); ?>
