<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-header">
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h1>
		</div>
		<div class="entry-meta">
			<?php philips_posted_on(); ?>
		</div><!-- .entry-meta -->
		<div class="entry-content">
			<?php the_content();?>
		</div>
		<footer class="entry-footer">
			<?php philips_entry_footer(); ?>
		</footer><!-- .entry-footer -->
</article>