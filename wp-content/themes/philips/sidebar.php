<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package philips
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="main-sidebar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>


