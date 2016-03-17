<?php
/**
 * The template for listing 3 in a row
 *
 *
 */
?>
<?php if ( '' != get_the_post_thumbnail() ) { ?>
	<a class="gi tcrdwrap" href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail( 'medium' ); ?>
		<?php get_template_part( 'partials/titlecard' ); ?>
	</a>
<?php } ?>