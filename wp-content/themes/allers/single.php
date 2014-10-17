<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header('saluti'); ?>

<div class="container">

			<div class="main">

				<?php while ( have_posts() ) : the_post(); ?>					

					<?php get_template_part( 'content-single', get_post_format() ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>