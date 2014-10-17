<?php
/**
 * Template Name: News Template
 * Description: A Page Template that showcases Sticky Posts, Asides, and Blog Posts
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header('saluti'); ?>

<div class="container">
  <ul class="breadcrumbs">
    <?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb();
} ?>
  </ul>
  <div class="main">
    <?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'news',
			  'posts_per_page' => 5, 
			  'orderby' => 'date',
			  'order' => 'DESC',
			  'paged' => $paged 
	    );
$wp_query = new WP_Query($args);
global $more; $more = -1; //declare and set $more before The Loop 
while ( have_posts() ) : the_post(); 
   ?>
    <h3><a href="<?php the_permalink(); ?>">
    <?php the_title(); ?>
    </a></h3>
    <?php
     the_content(); 
	 endwhile;
wp_reset_postdata();
?>
<?php next_posts_link( '&larr; Older posts' ); ?>
<?php previous_posts_link( 'Newer posts &rarr;' );?>
  </div>
</div>
<?php get_footer(); ?>
