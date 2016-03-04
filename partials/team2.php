<?php
/**
 * The template for listing the team members
 *
 * Displays the team members in rows of two
 *
 */
?>
<?php 
	$args = array( 
		'posts_per_page' => -1,
		 'orderby' => 'ASC',
		 'post_type' => 'teammate',
		 'group' => 'active',
		 'post_status' => 'publish'
	);
	$featposts = get_posts( $args );
	foreach ( $featposts as $post ) :
	  	setup_postdata( $post ); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('team-about'); ?>>
		
		<div class="phead cf">
            <header class="article-header tcrd">
                <div>
                    <?php 
						if ( '' != get_the_post_thumbnail() ) {
						    the_post_thumbnail( 'medium', array( 'class' => 'team-img' ) );
						} else {
						    echo '<img src="'. get_bloginfo('template_directory'). '/images/fpo_3x4.png" alt="3x4 Image">';
						}
					?>
                </div>
            </header>
            <div class="pcont entry-content">
                <div class="text">
                    <h4><?php the_title(); ?><span class="genericon genericon-expand"></span></h4>
                    <?php if( get_field('subtitle') ): ?>
                        <h5 class="subheading"><?php the_field('subtitle'); ?></h5>
                    <?php endif; ?>
                    <div class="slide" ><?php the_content(); ?></div>
                    <?php 
					$email = get_field( "email" );
					
					if( $email ) {
					
						echo '<a href="mailto:'. $email .'" class="email">'. $email .'</a>';
						
						}
					?>
					<div class="team-deets cf">
					<?php if( get_field('social') ): ?>
						<ul class="nav-social cf">
						<?php while( has_sub_field('social') ): ?>
							<li><a href="<?php the_sub_field('link'); ?>" class="<?php the_sub_field('platform'); ?>"><span class="genericon genericon-<?php the_sub_field('platform'); ?>"></span></a></li>
						<?php endwhile; ?>
						</ul>
					<?php endif; ?>
					</div>
                </div>
            </div>
        </div>
		
	</article><!-- #post -->

	<?php endforeach; 
		wp_reset_postdata();
	?>