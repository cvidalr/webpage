<?php
/**
 * Template Name: Detailed Page Template
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

get_header('allmed');
$imageInduDetails='';
$imageInduDetails = get_field('industrial_image', $post->ID); 

if($imageInduDetails){
   
	$imageInduContent = '<img src="'.$imageInduDetails['url'].'" />';
}


?>

<div class="container">  
  <ul class="breadcrumbs">
    <?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb();
} ?>
  </ul>
  <div class="main">
    <?php while ( have_posts() ) : the_post();
	?>
    <h1>
      <?php the_title(); ?>
    </h1>
     <?php echo $imageInduContent;the_content(); ?>
    <?php endwhile; // end of the loop. ?>    
  </div>
</div>
<?php get_footer(); ?>
