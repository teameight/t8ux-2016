<?php
/**
 * The main template file, also the homepage
 *
 */

get_header(); ?>

	<section class="section cf home-main">
		<h1><?php bloginfo('name'); ?></h1>
		<?php 
		$args = array( 
			'pagename'		=> 'home', // home page id
		);
		$homep = new WP_Query( $args );
		
		if($homep->have_posts()) : 
		    while($homep->have_posts()) : 
		    	$homep->the_post();
 		?>
			<?php the_content(); ?>
			<?php if( get_field('big_notice') ) { ?>

	</section>

	<section class="section cf big-notice">
		<?php the_field('big_notice'); ?>
	</section>

			<?php } ?>
		<?php endwhile; endif; ?>
		<?php wp_reset_postdata(); ?>
	</section>
	
	<?php get_template_part( 'partials/featposts' ); ?>

	<section class="section g g-3up cf">
	    <a class="anchor" name="other"></a>
		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'partials/threerow' ); ?>
		<?php endwhile; ?>
<!--		<a class="more" href="#">View More</a>-->
	</section>

	<?php if($homep->have_posts()) : 
		    while($homep->have_posts()) : 
		    	$homep->the_post(); ?>
	<?php if( get_field('makers') ) { ?>


	<section class="section cf makers">
		<a class="anchor" name="makers"></a>
		<div class="phead cf">
		    <header class="article-header tcrd">
		        <div>
		            <h1><?php the_field('makers_label'); ?></h1>
		            <h5 class="subheading"><?php the_field('makers_sub'); ?></h5>
		        </div>
		    </header>
		    <div class="pcont entry-content">
		        <div class="text">
		        	<?php the_field('makers'); ?>
		        </div>
		    </div>
		</div>

	</section>

	<?php } ?>
	<?php endwhile; endif; ?>
	<?php wp_reset_postdata(); ?>

	<?php 
		$args = array( 
			'posts_per_page' => -1,
			 'orderby' => 'menu_order',
			 'order' => 'ASC',
			 'post_type' => 'teammate',
			 'group' => 'active',
			 'post_status' => 'publish'
		);
		$featposts = get_posts( $args );
		foreach ( $featposts as $post ) :
		  	setup_postdata( $post );

			include(locate_template('partials/teammate.php'));

		endforeach; 
		wp_reset_postdata();
	?>
	
<?php get_footer(); ?>