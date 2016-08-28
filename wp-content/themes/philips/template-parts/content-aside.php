<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-meta">
			<?php philips_posted_on(); ?>
		</div><!-- .entry-meta -->
		<div class="entry-content">
			<div class="post-aside">
				<?php the_content();?>			
			</div>
		</div>
		<footer class="entry-footer">
			<?php philips_entry_footer(); ?>
		</footer><!-- .entry-footer -->
</article>