<?php
/**
 * The template for listing featured projects
 *
 * Displays the four most recent featured projects
 *
 */
?>
    <section class="section case-studies cf">
	    <a class="anchor" name="featured"></a>
		<?php 
		$args = array( 
			'posts_per_page' 	=> 4,
			'category_name'		=> 'featured'
		);
		$featposts = get_posts( $args );
		$pcount = 1;

		?>
		<?php foreach ( $featposts as $post ) : ?>
		  	<?php setup_postdata( $post ); ?>

		  	<?php if ( '' != get_the_post_thumbnail() ) { ?>
		<article class="case-study cf">
			<a class="cs-link" href="<?php the_permalink(); ?>">
				<div class="imgwrap">
				<?php  
					
					$f_image_2 = get_field('second_featured_image');
					if($f_image_2) {
						$size = "full";
						 
						teameight_images($f_image_2, $size, "no-mobile");
					}

					teameight_images(get_post_thumbnail_id(), 'large');

					?>
				</div>
				<div class="card animatable" href="<?php the_permalink(); ?>">
					<div class="title"><h1 class="alt"><?php the_title(); ?></h1></div>
					<div class="labels">
						<h4 class="alt">Case Study .<?php echo str_pad($pcount, 2, "0", STR_PAD_LEFT); ?></h4>
						<?php if( get_field('subtitle') ): ?>
							<h3 class="subheading"><?php the_field('subtitle'); ?></h3>
						<?php endif; ?>
					</div>
				</div>
			</a>
		</article>
		<?php $pcount++; ?>
		<?php } // end if post_thumbnail ?>
		<?php endforeach; ?>
		<?php wp_reset_postdata(); ?>
	</section>
