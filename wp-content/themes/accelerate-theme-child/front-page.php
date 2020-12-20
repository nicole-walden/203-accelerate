<?php
/**
 * The template for displaying the homepage
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 2.0
 */

get_header(); ?>

	<div id="primary" class="home-page hero-content">
		<div class="main-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<a class="button" href="<?php echo site_url('/case-studies/') ?>">View Our Work</a>
			<?php endwhile; // end of the loop. ?>
		</div><!-- .main-content -->
	</div><!-- #primary -->

<!-- FEATURED WORK -->
	<section class="featured-work">
		<div class="site-content">
			<h4>Featured Work</h4>

			<ul class="homepage-featured-work">
				<?php query_posts('posts_per_page=3&post_type=case_studies'); ?>
				<?php while ( have_posts() ) : the_post();
					$image_1 = get_field("image_1");
					$size = "medium";
				?>

				<li class="individual-featured-work">
					<figure>
						<a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image($image_1, $size); ?></a>
					</figure>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				</li>

				<?php endwhile; // end of the loop ?>
				<?php wp_reset_query(); // resets the altered query back to the original ?>
			</ul>
		</div>
	</section>

	<!-- OUR SERVICES -->
	<section class="our-services">
		<div class="site-content">
			<h4>Our Services</h4>

			<ul class="homepage-our-services">
				<?php query_posts('posts_per_page=4&post_type=services'); ?>
				<?php while ( have_posts() ) : the_post();
					$service_icon = get_field("service_icon");
					$size = "medium";
				?>

				<li class="homepage-individual-services">
					<figure>
						<?php echo wp_get_attachment_image($service_icon, $size); ?>
					</figure>
					<h3><?php echo the_title(); ?></h3>
				</li>

				<?php endwhile; // end of the loop ?>
				<?php wp_reset_query(); // resets the altered query back to the original ?>
			</ul>
		</div>
	</section>

	<!-- RECENT ITEMS -->
	<section class="recent-items">
		<div class="site-content">

			<div class="blog-post"> <!-- BLOG POST -->
				<h4>From the Blog</h4>
				<?php query_posts('posts_per_page=1'); ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<h3><?php the_title(); ?></h3>
					<?php the_excerpt(); ?>
				<?php endwhile; // end of the loop ?>
				<?php wp_reset_query(); // resets the altered query back to the original ?>
			</div>

			<div class="blog-post"> <!-- DYNAMIC SIDEBAR -->
				<h4>Recent Tweet</h4>
				<h3>@Accelerate</h3>
				<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
				<div id="secondary" class="widget-area" role="complementary">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
					<p class="read-more-link"><a href="http://www.twitter.com">Follow Us &rsaquo;</a></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
