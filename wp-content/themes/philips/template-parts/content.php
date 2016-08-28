<?php
/**
 * @package philips
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php philips_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
            <div class="entry-thumbnail">
               <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'philips' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">         <?php the_post_thumbnail('philips-blog-thumbnails', array( 'alt' => get_the_title())); ?></a>
            </div>        



            <div class="entry-contents">
            <?php	the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'philips' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );    ?>
            </div>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'philips' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php philips_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->