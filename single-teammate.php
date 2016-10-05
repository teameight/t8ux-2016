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

            <section class="section cf designers-on-duty">
                <article class="wrap">
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
                        </div>

                    </div>

                </article>
            </section>

            <?php endwhile; ?>


		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>