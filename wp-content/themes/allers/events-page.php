<?php
/**
 * Template Name: Events Template
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
$args = array( 'post_type' => 'events',
			  'posts_per_page' => 5, 
			  'meta_key'=>'date',
	          'orderby' => 'meta_value',
	          'order' => 'ASC',
			  'paged' => $paged 
	    );
$wp_query = new WP_Query($args);

while ( have_posts() ) : the_post(); 
    $event_date = get_post_custom_values('date');
	$aDate = explode("/", $event_date[0]);
     $iDT = $aDate[0];
     $iMon = $aDate[1];
    echo '<span class="event"><span class="date">'.$iDT.'<strong>'.$iMon .'</strong></span><span class="dateContontdetail">';
?>
    <h3><a href="<?php the_permalink(); ?>">
    <?php the_title(); ?>
    </a></h3>
    <?php
    echo '</span></span>'; // Markup closing tags.
     the_content(); 
	 endwhile;
?>
<?php next_posts_link( '&larr; Older posts' ); ?>
<?php previous_posts_link( 'Newer posts &rarr;' );?>
  </div>
</div>
<?php get_footer('saluti'); ?>
