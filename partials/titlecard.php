<?php
/**
 * Title Cards
 *
 * Markup for grid items' title cards. Used in partials/featposts.php,
 * partials/tworows.php, partials/threerows.php,
 */
?>
<div class="title-card tcrd">
	<div>
		<h3><?php the_title(); ?></h3>
	<?php if( get_field('subtitle') ): ?>
		<h5 class="subheading"><?php the_field('subtitle'); ?></h5>
	<?php endif; ?>
	</div>
</div>