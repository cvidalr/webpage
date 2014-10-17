<?php
/**
 * Template Name: Contact Us Template
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

get_header();
$slideShowName = get_field('slideshow_name', $post->ID);
?>
<div class="container">
  <div class="slider">
    <?php  
    if($slideShowName!=''){
 		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow($slideShowName); }
    }else{
    	if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('home'); } 
    }?>
  </div>
  <ul class="breadcrumbs">
    <?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb();
} ?>
  </ul>
  <div class="main">
    <div class="cell-left" style="width:920px;">
      <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'content', 'page' ); ?>
      <?php endwhile; // end of the loop. ?>
    </div>

<!--
    <div class="cell-Right">
      <div class="widget">
        <h2>Product Categories<span class="widgetIcon"></span></h2>
             
	  <?php
    /*  
        $catArgs=array(
		  'post_type' => 'page',
		  'post_status' => 'publish',
		  'cat' => 16,
		  'posts_per_page' => -1,
		  'caller_get_posts'=> 1,
		  'orderby' => 'menu_order',
		  'order' => 'ASC' 
		);
	  
		$catQuery = new WP_Query( $catArgs);
		$countItem=1;
		$countCatNum=1;
		
		if( $catQuery->have_posts() ) {
			
		  $catContent = '<ul class="bullet">';
		  
		  while ($catQuery->have_posts()) : $catQuery->the_post();
		  	
			 $catContent.='<li><a href="'.get_permalink($catQuery->post->ID).'">'.$catQuery->post->post_title.'</a></li>';
		 $countItem++;
		  ?>
		 
			<?php
		  endwhile;
		  echo $catContent.= '</ul>';
		}
		wp_reset_query();  */
		?>
      </div>
    </div>-->
  </div>
</div>
<?php get_footer(); ?>
