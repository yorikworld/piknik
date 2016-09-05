<?php
$name = get_term_by('slug', $term, 'product_tax')->name;
$paged = get_query_var('page') ? get_query_var('page') : 1;
get_header(); ?>
<!-- content-area -->
<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <article id="post">
                            <header class="entry-header">
                                <h1 class="entry-title"><?php echo $name; ?></h1>

                            </header>
                            <div class="entry-content">
                                <?php
                                $args = array(
//                                    'posts_per_page' => 3,
                                    'paged' => $paged,
                                    'post_type'      => 'product_menu',
                                    'post_status'    => 'publish',
                                    'tax_query'      => array(
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
                                        $the_query->the_post(); ?>
                                        <div class="col-xs-6 col-sm-3 col-md-4 col-lg-3">
                                            <div><?php the_title(); ?></div>
                                            <?php if (has_post_thumbnail()) {
                                                the_post_thumbnail('thumbnail');
                                                echo '<div>';
                                                the_excerpt_max_charlength(100);
                                                echo '</div>';
                                            } else {
                                                $src = get_stylesheet_directory_uri() . '/images/noimage-150x150.jpg';
                                                echo '<a href="' . get_the_permalink() . '" title="Крабовые палочки"><img width="150" height="150" src="' . $src . '" class="attachment-thumbnail size-thumbnail wp-post-image" alt="no-image"></a>';
                                            } ?>
                                        </div>

                                    <?php }
                                } else {
                                    // no posts found
                                }
                                ?>

                            </div>
                            <footer class="entry-footer">
                                <?php edit_post_link(esc_html__('Edit', 'philips'), '<span class="edit-link">',
                                    '</span>'); ?>
                            </footer><!-- .entry-footer -->
                            <?php if (function_exists('wp_pagenavi')) {
                                wp_pagenavi(array('query' => $the_query));
                            }
                            wp_reset_postdata();
                            ?>
                        </article>


                    </main>
                </div>
            </div>
<!--            <div class="col-md-4">-->
<!--                --><?php //get_sidebar(); ?>
<!--            </div>-->
        </div>
    </div>
</div><!-- content-area -->
<?php get_footer(); ?>
