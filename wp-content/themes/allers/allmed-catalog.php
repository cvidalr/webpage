<?php
/**
 * Template Name: Allmed Catalogue Template
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
$slideShowName = get_field('allmed_slideshow_name', $post->ID);
?>
<?php
$upcominargs=array(
  'post_type' => 'allmed',
  'post_status' => 'publish',
  'cat' => 18,
  'posts_per_page' => -1,
  'caller_get_posts'=> 1,
  'orderby' => 'menu_order',
  'order' => 'ASC' 
  );
$my_query = new WP_Query( $upcominargs);
//print_r($my_query);
$currentPageId=$post->ID;
if( $my_query->have_posts() ) {
  $linkContent = '<ul class="bullet">';
  while ($my_query->have_posts()) : $my_query->the_post();
  	$activeStatus ='';
	//echo $my_query->post->ID."==".$post->ID;
  	if($my_query->post->ID==$currentPageId){
		$activeStatus = 'class="active"';
	}
  	$linkContent.='<li '.$activeStatus.'><a href="'.get_permalink($my_query->post->ID).'">'.qtrans_use($q_config['language'],$my_query->post->post_title,true).'</a></li>';
  ?>
    <?php
  endwhile;
  $linkContent.= '</ul>';
}
wp_reset_query();  // Restore global post data stomped by the_post().
?>

<div class="container">
  <div class="slider">
    <?php     if($slideShowName!=''){
 		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow($slideShowName); }
    }else{
    	if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('allmed-home'); } 
    }?>

  </div>
  <ul class="breadcrumbs">
    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb();} ?>
  </ul>
  <div class="main">
    <div class="cell-left">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
       <?php endwhile; // end of the loop. ?>
    </div>
    <div class="cell-Right">
      <div class="widget">
        <h2>Product Lists<span class="widgetIcon"></span></h2>
        <?php echo $linkContent;?>
      </div>
    </div>
  </div>
</div>
<?php get_footer('allmed'); ?>