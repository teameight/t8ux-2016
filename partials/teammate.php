<?php
/**
 * The template for listing the team members
 *
 * Displays the team members in rows of two
 *
 */

$t_class = "team-about";
if(is_single()) $t_class .= " open";

?>
	<article id="post-<?php the_ID(); ?>" <?php post_class($t_class); ?>>
		
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
                    <div class="slide" >
						<div class="team-deets cf">                   
							<?php if( get_field('social') ): ?>
								<ul class="nav-social cf">
								<?php while( has_sub_field('social') ): ?>
									<li><a href="<?php the_sub_field('link'); ?>" class="<?php the_sub_field('platform'); ?>"><span class="genericon genericon-<?php the_sub_field('platform'); ?>"></span></a></li>
								<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>
                    	<?php the_content(); ?>
                    </div>
                    <div class="cf">
					<?php 
						$email = get_field( "email" );
						
						if( $email ) {
						
							echo '<a href="mailto:'. $email .'" class="email">'. $email .'</a>';
						
						}
					?>
					<?php if(!is_single() && get_field('show_recent') ) { ?>
						<a class="proj-link" href="<?php the_permalink(); ?>">recent projects &raquo;</a>
					<?php } ?>
					</div>
                </div>
            </div>
        </div>
		
	</article><!-- #post -->