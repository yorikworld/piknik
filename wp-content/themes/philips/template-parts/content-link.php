<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-meta">
			<?php philips_posted_on(); ?>
		</div><!-- .entry-meta -->
		<div class="entry-content">
			<div class="entry-link">
				<a target="_blank" href="<?php echo get_the_content(); ?>"><i class="fa fa-link"></i><?php the_title();?></a>
			</div>
		</div>
		<footer class="entry-footer">
			<?php philips_entry_footer(); ?>
		</footer><!-- .entry-footer -->
</article>