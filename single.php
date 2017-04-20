<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section id="blog-single" class="section blog blog-standard">
				<div class="container">
					<div class="row">
						<?php if(is_active_sidebar('blog-page-sidebar') && reign_get_blog_sidebar_position() == 'left-sidebar'): ?>
							<?php get_sidebar(); ?>
						<?php endif; ?>
						<?php if(is_active_sidebar('blog-page-sidebar') && reign_get_blog_sidebar_position() != 'false'): ?>
						<div class="col-md-8">
						<?php else : ?>
						<div class="col-md-8 col-md-offset-2">
						<?php endif; ?>

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'content-single', get_post_format() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		// End the loop.
		endwhile;
		?>
						</div>
							<?php if(is_active_sidebar('blog-page-sidebar') && reign_get_blog_sidebar_position() == 'right-sidebar'): ?>
								<?php get_sidebar(); ?>
							<?php endif; ?>
					</div>
				</div>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
