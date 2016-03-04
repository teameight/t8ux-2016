<?php
/**
 * The template for listing featured projects
 *
 * Displays the four most recent featured projects
 *
 */
?>
    <section class="section g g-2up cf">
	    <a class="anchor" name="featured"></a>
		<?php 
		$args = array( 
			'posts_per_page' 	=> 4,
			'category_name'		=> 'featured'
		);
		$featposts = get_posts( $args );
		?>
		<?php foreach ( $featposts as $post ) : ?>
		  	<?php setup_postdata( $post ); ?>
		<div class="gi tcrdwrap" id="gi-<?php the_ID(); ?>">
			<a href="<?php the_permalink(); ?>">
				<?php 
				if ( '' != get_the_post_thumbnail() ) {
				    the_post_thumbnail( 'large' );
				} else {
				    echo '<img src="'. get_bloginfo('template_directory'). '/images/fpo_4x3.png" alt="4x3 Image">';
				}
				?>
				<?php get_template_part( 'partials/titlecard' ); ?>
			</a>
		</div>
		<?php endforeach; ?>
		<?php wp_reset_postdata(); ?>
<!--		<a class="more" href="#">View More</a>-->
	</section>
