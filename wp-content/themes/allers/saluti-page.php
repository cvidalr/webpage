<?php
/**
 * Template Name: Saluti Page Template
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
<script type="text/javascript" language="javascript">

$(document).ready(function() {
    $('#OurBrandCarousel').jcarousel({
        auto: 2,
        wrap: 'circular',
		scroll:1,
        initCallback: mycarousel_initCallback
    });
});

</script>

<div class="container">
  <ul class="latestNews">
    <li>
      <marquee scrollamount="3" behavior="scroll" onmouseout="this.start();" onmouseover="this.stop();">
      <?php 
$args = array(
    'post_type' => 'news',
	'post__not_in' => array(394),
    'posts_per_page' => 5
);
$news_query = new WP_Query($args);
while ($news_query->have_posts()) : $news_query->the_post();
   ?>
      <a href="<?php the_permalink(); ?>">
      <?php the_title(); ?>
      &nbsp;&nbsp;&nbsp;&nbsp; </a>
      <?php
endwhile;
 ?>
      </marquee>
    </li>
    <li class="last"></li>
  </ul>
  <div class="slider">
    <?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('saluti'); } ?>
  </div>
  <div class="main mainHome">
    <ul class="salutBox">
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
          <h3><?php echo __("<!--:en-->NEWSLETTER<!--:--><!--:es-->BOLETÍN DE NOTICIAS<!--:-->"); ?></h3>
          <p><?php echo __("<!--:en-->Be the first to know our offerts, Discounts and news<!--:--><!--:es-->Se el primero en conocer nuestras ofertas, descuentos y noticias<!--:-->"); ?></p>
		  
          <?php $subscriptionForm = \SimpleSubscribe\Developers::getSubscriptionForm();
	  echo $subscriptionForm;
	  ?>

	</div>
        <div class="cellR">
          <div class="newsletterIcon"></div>
        </div>
      </li>
    </ul>
    <div class="promotional-product">
      <h2><span>Promotional Products</span></h2>

    <?php 
        $promoArgs=array(
		  'post_type' => 'saluti',
		  'post_status' => 'publish',
		  'post_parent' => 500,
		  'posts_per_page' => -1,
		  'orderby' => 'menu_order',
		  'order' => 'ASC' 
		);
	  
		$promoQuery = new WP_Query( $promoArgs);
		
		if( $promoQuery->have_posts() ) {
			
		  $promoContent = '<ul id="mycarousel" class="jcarousel-skin-tango" style="border:none; height:178px;">';
		  
		  while ($promoQuery->have_posts()) : $promoQuery->the_post();
		  	
			 $promoImage = get_field('saluti_image', $promoQuery->post->ID); 
			 if($promoImage){
				 //print_r($promoImage);
				 $promoContent.='<li><img src="'.$promoImage['url'].'"  alt="'.qtrans_use($q_config['language'],$promoQuery->post->post_title,true).' " /><a href="'.get_permalink($promoQuery->post->ID).'"><h4>'.qtrans_use($q_config['language'],$promoQuery->post->post_title,true).'</h4></a>'; 
			 }
		  ?>
    <?php
		  endwhile;
		   $promoContent.= '</ul>';
		}
		wp_reset_query();  
		?>      
      <?php echo $promoContent;?>
    </div>
    <div id="tabsEvent">
      <ul>
        <li><a href="#tab-1">Events Calendar</a></li>
        <li><a href="#tab-2">Medical Blog</a></li>
      </ul>
      <div id="tab-1">
        <?php // First lets set some arguments for the query:
// Optionally, those could of course go directly into the query,
// especially, if you have no others but post type.
$args = array(
    'post_type' => 'events',
	'post__not_in' => array(390),
    'posts_per_page' => 3,
	'meta_key'=>'date',
	'orderby' => 'meta_value_num',
	'order' => 'ASC'
    // Several more arguments could go here. Last one without a comma.
);
// Query the posts:
$obituary_query = new WP_Query($args);
$meses = array("","ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
// Loop through the obituaries:
while ($obituary_query->have_posts()) : $obituary_query->the_post();
    // Echo some markup
    $event_date = get_post_custom_values('date');
	$aDate = explode("/", $event_date[0]);
     $iDT = $aDate[0];
     $iMon = $aDate[1];
	 $iMon = (int)$iMon;
	 $sMes=$meses[$iMon];
    echo '<span class="event"><span class="date">'.$iDT.'<strong>'.$sMes .'</strong></span><span class="dateContont">';
    // As with regular posts, you can use all normal display functions, such as
   ?>
        <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
        </a><br />
        <?php //the_content(); 
    echo '</span></span>'; // Markup closing tags.
endwhile;
wp_reset_postdata(); ?>
      </div>
      <div id="tab-2">
      	
      	<ul id="archive-list">
			<?php
			$myposts = get_posts('numberposts=-1&');
			foreach($myposts as $post) : ?>
			<!--<li> <a href="<?php the_permalink(); ?>" target="_new"><?php the_title(); ?>articulo</a></li></br>-->
			<?php the_time('m/d/y') ?> <a href="<?php the_permalink(); ?>" target="_new"><?php the_title(); ?></a><br>
			<?php endforeach; ?>
		</ul>
		

		 
      </div>
    </div>
    <?php 
        $linksArgs=array(
		  'post_type' => 'saluti_links',
		  'post_status' => 'publish',
		  'posts_per_page' => -1,
		  'orderby' => 'menu_order',
		  'order' => 'ASC' 
		);
	  
		$linksQuery = new WP_Query( $linksArgs);
		
		if( $linksQuery->have_posts() ) {
			
		  $linksContent = '<ul class="findIn">';
		  
		  while ($linksQuery->have_posts()) : $linksQuery->the_post();
		  	
			 $link_url = get_field('saluti_url', $linksQuery->post->ID); 
			
			 $linksContent.='<li><a href="'.$link_url.'" target="_blank">'.qtrans_use($q_config['language'],$linksQuery->post->post_title, true).'</a></li>'; 
		  ?>
    <?php
		  endwhile;
		   $linksContent.= '</ul>';
		}
		wp_reset_query();  
		?>
    <?php echo $linksContent;?>
    <div class="raw">
      <?php 
        $brandArgs=array(
		  'post_type' => 'our-brands',
		  'post_status' => 'publish',
		  'cat' => 25,
		  'posts_per_page' => -1,
		  'orderby' => 'menu_order',
		  'order' => 'ASC' 
		);
	  
		$brandQuery = new WP_Query( $brandArgs);
		
		if( $brandQuery->have_posts() ) {
			
		  $brandContent = '<h2 class="ourBrandsHead">Our Brands</h2><ul id="OurBrandCarousel"  class="jcarousel-skin-tango">';
		  
		  while ($brandQuery->have_posts()) : $brandQuery->the_post();
		  	
			 $brand_image = get_field('brand_image', $brandQuery->post->ID); 
			 $brand_url   = get_field('brand_url', $brandQuery->post->ID); 
			 if($brand_url!=''){
				  $brandContent.='<li><a href="' . qtrans_convertURL($brand_url) . '"><img src="'.$brand_image['url'].'" width="202" height="83" alt="'.qtrans_use($q_config['language'],$brandQuery->post->post_title, true).'" /></a></li>';
			 }else{
				  $brandContent.='<li><img src="'.$brand_image['url'].'" width="202" height="83" alt="'.qtrans_use($q_config['language'],$brandQuery->post->post_title, true).'" /></li>'; 
			 }
			
			 $brand_url='';
		  ?>
      <?php
		  endwhile;
		   $brandContent.= '</ul>';
		}
		wp_reset_query();  
		?>
      <?php echo $brandContent; ?></div>
  </div>
</div>
<!-- #primary -->
<?php //get_sidebar(); ?>
<?php get_footer('saluti'); ?>
