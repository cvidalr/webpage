<?php
/**
 * Template Name: Saluti Promotions Template
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

get_header('saluti');
$slideShowName = get_field('saluti_slideshow_name', $post->ID);
?>

<div class="container">
  <div class="slider">
    <?php if($slideShowName!=''){
 		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow($slideShowName); }
    }else{
    	if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('saluti-promotional-products'); } 
    }?>
  </div>
  <ul class="breadcrumbs">
    <?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb();
} ?>
  </ul>
  <div class="main">
    <?php
$upcominargs=array(
  'post_type' => 'saluti',
  'post_status' => 'publish',
  'cat' => 22,
  'posts_per_page' => -1,
  'caller_get_posts'=> 1,
  'orderby' => 'menu_order',
  'order' => 'ASC' 
  );
$my_query = new WP_Query($upcominargs);
//print_r($my_query);
$currentPageId=$post->ID;
$imageBannerContent ='';
$imageBannerDetails = get_field('saluti_banner_image', $post->ID); 
// print_r($imageBannerDetails);
if($imageBannerDetails){					 
	$imageBannerContent = '<span class="innerPage-Bnr"><img src="'.$imageBannerDetails['url'].'" width="647" height="158" /></span>';
}

$imagepromoContent ='';
$imagePromoDetails = get_field('saluti_image', $post->ID); 
// print_r($imageBannerDetails);
if($imagePromoDetails){					 
	$imagepromoContent = '<img src="'.$imagePromoDetails['url'].'" width="372" height="152"   class="imgLeft" />';
}

if( $my_query->have_posts() ) {
  $linkContent = '<div id="tabsInner"><ul>';
  while ($my_query->have_posts()) : $my_query->the_post();
	  
	  $activeStatus ='';
	  
	  if($my_query->post->ID==$currentPageId){
	 	 $activeStatus = 'class="active"';
	  }
	  $linkContent.='<li '.$activeStatus.'><a href="'.get_permalink($my_query->post->ID).'">'.qtrans_use($q_config['language'],$my_query->post->post_title,true).'</a></li>';
  ?>
    <?php
  endwhile;
 echo $linkContent.= '</ul>';
}
wp_reset_query();  // Restore global post data stomped by the_post().
?>
    <div id="tab-1"> <?php echo $imageBannerContent;?>
      <h3>
        <?php the_title(); ?>
      </h3>
      <?php echo $imagepromoContent;?>
      <?php the_content(); ?>
      </p>
    </div>
  </div>
  <!--<ul class="salutBox salutBoxInner">
      <li>
        <div class="cellL">
          <h3> Check your points</h3>
          <input type="text" value=""  class="checkyour-input"/>
          <input type="submit" value="" class="checkyour-btn"  />
        </div>
        <div class="cellR">
          <div class="salutiCard"></div>
        </div>
      </li>
      <li>
        <div class="cellL">
          <h3> newsletter</h3>
          <p>Be the first to know our offerts, Discounts and news</p>
          <span class="newsletterBg">
          <input type="text" value="" class="newsletter-input" />
          <input type="submit" value=""  class="newsletter-btn"/>
          </span> </div>
        <div class="cellR">
          <div class="newsletterIcon"></div>
        </div>
      </li>
    </ul>-->
</div>
</div>
<?php get_footer('saluti'); ?>