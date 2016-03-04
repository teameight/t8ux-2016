<?php
/**
 * The template for listing two in a row in a grid
 *
 *
 */
?>

<?php if ( '' != get_the_post_thumbnail() ) { ?>
	<div class="gi" id="gi-<?php the_ID(); ?>">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'large' ); ?>
			<?php get_template_part( 'partials/titlecard' ); ?>
		</a>
	</div>
<?php } ?>