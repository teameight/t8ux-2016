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
	<section class="section cf about-do">
	    <div class="wrap">
		    <div class="doing-now">
		    	<h4>Here's what we're working on</h4>
		    	<p><em>pretty much right this second</em></p>
		    	<?php echo do_shortcode('[instagram-feed showheader=false showfollow=false showbutton=false]'); ?>
		    	<a class="instalink" href="https://www.instagram.com/shoutforthings/">@shoutforthings</a>
		    </div>
		    <div class="doing-next">
		    	<h4>AND HERE ARE SOME THINGS <em>WE</em> SHOULD DO NEXT</h4>
		    	<p><em>as in together. check all that apply</em></p>
		    	<?php echo do_shortcode('[gravityform id=1 title=false description=false]'); ?>
		    </div>
		</div>
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
		<article class="wrap">
			<h3 class="alt">Designers on Duty</h3>
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

			<?php 
				$args = array( 
					'posts_per_page' => -1,
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'post_type' => 'teammate',
					'group' => 'hired-hands',
					'post_status' => 'publish'
				);
				$featposts = get_posts( $args );

				if($featposts){ ?>

	<section class="section cf hired-hands">
		<article class="wrap">
			<h3 class="alt">Hired Hands</h3>
			<?php 

				$groupId = get_term_by( 'slug', 'hired-hands', 'group' );
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
								echo "<div class='imagewrap'>";
							    the_post_thumbnail( 'medium', array( 'class' => 'team-img' ) );
							    echo '</div>';
							} 

							$site_link = get_field('website');

							if($site_link == '' || !$site_link) $site_link = get_the_permalink();
						?>
						<div class="deets">
							<h1><?php the_title(); ?></h1>
							<h4><?php the_field('subtitle'); ?></h4>
							<p><a class="sitelink" href="<?php echo $site_link; ?>">work &amp; profile &raquo;</a></p>
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

<?php endwhile; ?>


<?php get_footer(); ?>