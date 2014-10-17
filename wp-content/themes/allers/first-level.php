<?php
/**
 * Template Name: First Level Template
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
$categories = get_the_category();  $cat_name = $categories[0]->slug;
?>

<div class="container SubBanner">
  <div class="slider">
    <?php
$page_title = $wp_query->post->post_title;

//coment india
/*
    if($slideShowName!=''){
 	if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow($slideShowName); }
    }
    else{
    	if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('home'); } 
    }
*/
//slide personal
    //Hospitales
	if(($page_title == 'Hospitales')||($page_title == 'Hospitals')){ 
		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('hospitales'); }
	}
    //Farmacias
	if(($page_title == 'Farmacias')||($page_title == 'Pharmacies')){
		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('farmacias'); } 
	}
    //Profesionales de la Salud
	if(($page_title == 'Profesionales de la Salud')||($page_title == 'Healthcare Professionals')){
		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('profesionales-salud'); } 
	}
    //Proveedores
	if(($page_title == 'Proveedores')||($page_title == 'Suppliers Section')){
		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('proveedores'); } 
	}
    //Catálogos
	if(($page_title == 'Catálogos')||($page_title == 'Catálogos')){
                if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('home'); }
        }
    //protección de datos 
	if($page_title == 'protección de datos'){
                if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('home'); }
        }
    ?>
    <div class="bannerSml"><?php echo qtrans_use($q_config['language'],$post->post_title, true);?></div>
  </div>
  <ul class="breadcrumbs">
    <?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb();
      } 
    ?>
  </ul>
  <div class="main">
    <?php while ( have_posts() ) : the_post(); ?>
    <h1>
      <?php the_title(); ?>
    </h1>
    <?php endwhile; // end of the loop. ?>
    <?php   
	  $catId = $categories[0]->cat_ID;
	 // print_r($categories);
	  ?>
    <?php

$upcominargs=array(
  'post_type' => 'page',
  'post_status' => 'publish',
  'post_parent' => $post->ID,
  'posts_per_page' => -1,
  'caller_get_posts'=> 1,
  'orderby' => 'menu_order',
  'order' => 'ASC' 
  );
$my_query = new WP_Query( $upcominargs);
//print_r($my_query);

if( $my_query->have_posts() ) {
  
  while ($my_query->have_posts()) : $my_query->the_post();
 // print_r($my_query->post);
  $imageContent = '<img src="'.get_bloginfo( 'template_directory' ) .'/images/testimonial.png" width="132" height="89" alt="No Image Found" class="imgLeft" />';
  $imageDetails = get_field('image', $my_query->post->ID); 
  if($imageDetails){
	 
	  $imageContent = '<img src="'.$imageDetails['url'].'" width="132" height="89" alt="'.$my_query->post->post_title.'" class="imgLeft" />';
  }

 // $imageUrl = wp_get_attachment_image_src($imageDetails[0],'medium');
 // print_r($imageUrl);
  ?>
    <div class="raw">
      <div class="raw-Left"> <?php //echo $imageContent;?> </div>
      <div class="raw-Right">
        
          <h3 style="color: #EE3D41"><!--<a href="<?php echo get_permalink($my_query->post->ID);?>">-->
          <?php the_title(); ?>
          <!--</a>--></h3>
       
        <?php the_content(); ?>
      </div>
    </div>
    <?php
  endwhile;
}
wp_reset_query();  // Restore global post data stomped by the_post().
?>
  </div>
</div>
<?php get_footer(); ?>
