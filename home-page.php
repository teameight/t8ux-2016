<?php
/**
 *
 *	Template Name: Home Page
 *
 */

get_header(); ?>

	<section class="section cf home-main">
		<h1><?php bloginfo('name'); ?></h1>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
			<?php if( get_field('big_notice') ) { ?>

	</section>

	<section class="section cf big-notice">

<div class="phead cf">
    <header class="article-header tcrd">
        <div>
            <h1>Read This Note</h1>
            <h5 class="subheading">it's important</h5>
        </div>
    </header>
    <div class="pcont entry-content">
        <div class="text">
        	<?php the_field('big_notice'); ?>
        </div>
    </div>
</div>

	</section>

			<?php } ?>
		<?php endwhile; ?>
	</section>

	<?php get_template_part( 'partials/featposts' ); ?>

	<section class="section g g-3up cf">
	    <a class="anchor" name="other"></a>
		<?php 
		// Most recent 9 STICKY POSTS ONLY from the Other Things category
		$args = array( 
			'cat'					=> 48, // featured cat id
			'ignore_sticky_posts'    => 0,
	        'post__in'               => get_option( 'sticky_posts' ),
	        'posts_per_page'         => 9
		);
		$others = new WP_Query( $args );
		
		if($others->have_posts()) : 
		      while($others->have_posts()) : 
		         $others->the_post();
		?>
			<?php get_template_part( 'partials/threerow' ); ?>
		<?php endwhile; endif; ?>
		<?php wp_reset_postdata(); ?>
<!--		<a class="more" href="#">View More</a>-->
	</section>


<?php while ( have_posts() ) : the_post(); ?>
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
<?php endwhile; ?>


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