<?php
/**
 * The template for listing 3 in a row
 *
 *
 */
?>
<?php if ( '' != get_the_post_thumbnail() ) { ?>
	<a class="gi tcrdwrap" href="<?php the_permalink(); ?>">
		<?php teameight_images(get_post_thumbnail_id(), 'medium'); ?>
		<?php get_template_part( 'partials/titlecard' ); ?>
	</a>
<?php } ?>