<?php
/**
 * Template Name: Allmed Home Template
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
?>
<script type="text/javascript" language="javascript">

$(document).ready(function() {
    $('#OurBrandCarousel').jcarousel({
        auto: 2,
        wrap: 'last',
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
    <?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('allmed-home'); } ?>
  </div>
  <div class="main mainHome">
    <?php
      
        $catArgs=array(
		  'post_type' => 'allmed',
		  'post_status' => 'publish',
		  'cat' => 18,
		  'posts_per_page' => -1,
		  'caller_get_posts'=> 1,
		  'orderby' => 'menu_order',
		  'order' => 'ASC' 
		);
	  
		$catQuery = new WP_Query( $catArgs);
		$countItem=1;
		$countCatNum=1;
		
		if( $catQuery->have_posts() ) {
			
		  $catContent = '<div class="quickButtn-allmed"><ul>';
		  
		  while ($catQuery->have_posts()) : $catQuery->the_post();
		  	
			 $catContent.='<li><a href="'.get_permalink($catQuery->post->ID).'">'.qtrans_use($q_config['language'],$catQuery->post->post_title,true).'</a></li>';
		 $countItem++;
		  ?>
    <?php
		  endwhile;
		   $catContent.= '</ul></div>';
		}
		wp_reset_query();  
		?>
    <?php echo $catContent;?>
    <div class="allmedhome-cellL">
      <p><img src="<?php echo get_template_directory_uri(); ?>/images/allmed-banner.png" width="673" height="111" /></p>
      <ul class="allmedLink">
        <?php 
$industargs = array( 'post_type' => 'industrial',
			  'posts_per_page' => 3, 
			  'orderby' => 'date',
			  'order' => 'DESC'
	    );
$industQuery = new WP_Query($industargs);
$industryContent='';
while ( $industQuery->have_posts() ) : $industQuery->the_post(); 
	$imageInduContent ='<img src="'.get_bloginfo( 'template_directory' ) .'/images/testimonial.png" width="93" height="76" alt="No Image Found" />';
	$imageInduDetails = get_field('industrial_image', $industQuery->post->ID); 
	if($imageInduDetails){
	   
		$imageInduContent = '<img src="'.$imageInduDetails['url'].'"  width="93" height="76"  />';
	}

$industryContent.='<li>
            <div class="LinkImg">'.$imageInduContent.'</div>
            <div class="LinkTxt">
              <h2>'.qtrans_use($q_config['language'],$industQuery->post->post_title,true).'</h2>
             '. readMoreWithContent(35,qtrans_use($q_config['language'],$industQuery->post->post_content,true),$industQuery->post->ID).'
            </div>
          </li>';?>
        <?php endwhile; 
echo $industryContent.'<li><div class="LinkImg">&nbsp;</div><div class="LinkTxt"><a href="'.get_permalink(537).'">View All</a></div></li>';
?>
      </ul>
    </div>
    <div class="allmedhome-cellR">
      <ul class="allmedhomeWidget">
        <li>
          <div class="publication"></div>
          <h4><a href="<?php echo get_permalink(474);?>"><?php echo qtrans_use($q_config['language'],get_the_title(474),true);?></a></h4>
        </li>
        <li>
          <div class="newsletters"></div>
          <h4><a href="#">Newsletter</a></h4>
          <p>Be the first to know 
            our offerts, discounts & news</p>
          <div class="raw">
            <form method="get" action="#">
              <input id="name" type="text" value="Enter Your Email ID" name="name" onfocus="form.name.value = ''"/>
              <input type="submit" value="Subscribe" />
            </form>
          </div>
        </li>
        <li>
          <div class="ordercatalog"></div>
          <h4><a href="<?php echo get_permalink(602);?>"><?php echo qtrans_use($q_config['language'],get_the_title(602),true);?></a></h4>
        </li>
      </ul>
    </div>
    <div class="raw">
      <?php 
        $brandArgs=array(
		  'post_type' => 'our-brands',
		  'post_status' => 'publish',
		  'cat' => 24,
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
<?php get_footer('allmed'); ?>
