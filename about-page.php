<?php
/**
 *
 *	Template Name: About
 *
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

	<section class="section cf about-intro">
	    <article class="pcont entry-content">
        	<?php the_content(); ?>
	    </article>
	</section>
			<?php
				$args = array(
					'posts_per_page' => -1,
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'post_type' => 'teammate',
					'group' => 'designers-on-duty',
					'post_status' => 'publish'
				);
				$featposts = get_posts( $args );

				if($featposts){ ?>

	<section class="section cf designers-on-duty">

		<div class="wrap team-photo">

			<?php
				if ( $team_photo = get_field('team_photo') ) :

					echo '<img src="' . $team_photo['url'] . '" alt="' . $team_photo['alt'] . '" />';

				endif;
			?>

		</div>
		<article class="wrap">
			<?php

				$groupId = get_term_by( 'slug', 'designers-on-duty', 'group' );
				$groupId = $groupId->term_id;

				$groupDesc = term_description( $groupId, 'group' );

				if($groupDesc != '' && $groupDesc){

			?>
			<p class="emphasized"><?php echo $groupDesc; ?></p>
			<? } ?>

				<?php
					foreach ( $featposts as $post ) :
					  	setup_postdata( $post );

					?>
					<div class="teammate">
	                    <?php
							if ( '' != get_the_post_thumbnail() ) {
							    the_post_thumbnail( 'medium', array( 'class' => 'team-img' ) );
							}
						?>
						<div class="deets">
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
							<p><a class="email" href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
							<?php if( get_field('social') ): ?>
								<ul class="nav-social cf">
								<?php while( has_sub_field('social') ): ?>
									<li><a href="<?php the_sub_field('link'); ?>" class="<?php the_sub_field('platform'); ?>"><span class=" icon-<?php the_sub_field('platform'); ?>"></span></a></li>
								<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>

					</div>


					<?php

					endforeach;
				?>
		</article>
	</section>

			<?php
				}
			wp_reset_postdata(); ?>

		<section class="section cf next-page-cta">
			<a class="anchor" name="start"></a>
			<article class="cf">
				<h5>Ready to <a href="<?php echo home_url('/contact/'); ?>">say hey? <svg class="cta-arrow"><use xlink:href="#arrow-icon"></use></svg></a></h5>
			</article>
		</section>

<?php endwhile; ?>


<?php get_footer(); ?>