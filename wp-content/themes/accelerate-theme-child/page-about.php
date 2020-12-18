<?php
/*
*Template Name: About
*Template Post Type: post, page
*
* @package WordPress
* @subpackage Accelerate Marketing
* @since Accelerate Marketing 2.0
*/

get_header(); ?>

	<div id="primary" class="home-page hero-content">
		<div id="content" role="main">

        <?php while ( have_posts() ) : the_post();
          $service_icon = get_field("service_icon");
          $size = "medium";
        ?>

        <article class="services clearfix">
          <div class="services-info">
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
          </div>

          <div class="services-icon">
            <?php if($service_icon) {
    				  echo wp_get_attachment_image( $service_icon, $size );
            } ?>
    			</div>
        </article>

			<?php endwhile; // end of the loop. ?>
		</div><!-- .main-content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
