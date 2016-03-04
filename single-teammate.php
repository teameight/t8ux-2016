<?php
/**
 * The template for displaying all single posts
 *
 */

get_header(); ?>
<?php $teammate_slug = "other-things"; ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'partials/teammate' ); ?>
                <?php $teammate_slug = $post->post_name; ?>

                <?php if( get_field('show_recent')  ) { ?>
                <section class="section g g-2up cf">
                    <h2 class="ghead <?php echo $teammate_slug; ?>"><span>Recent Projects</span></h2>
                    <?php 
                        $args = array( 
                            'posts_per_page'    => 6,
                            'tag'     => $teammate_slug
                        );
                        $featposts = get_posts( $args );
                        ?>
                        <?php foreach ( $featposts as $post ) : ?>
                            <?php setup_postdata( $post ); ?>
                            <?php include(locate_template('partials/tworow.php' )); ?>
                        <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                </section>
                <?php } ?>


            <?php endwhile; ?>


		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>