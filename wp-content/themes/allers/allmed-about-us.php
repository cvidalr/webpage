<?php
/**
 * Template Name: Allmed About Us Template
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

get_header('allmed'); ?>
<!--Product Tab-->
<script type="text/javascript">
$(document).ready(function(){
$('#tabsInner div').hide();
$('#tabsInner div:first').show();
$('#tabsInner ul li:first').addClass('active');
$('#tabsInner ul li a').click(function(){ 
$('#tabsInner ul li').removeClass('active');
$(this).parent().addClass('active'); 
var currentTab = $(this).attr('href'); 
$('#tabsInner div').hide();
$(currentTab).show();
return false;
});
});
</script>

<div class="container">
  <ul class="breadcrumbs">
    <?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb();
} ?>
  </ul>
  <?php while ( have_posts() ) : the_post(); ?>
  <?php 
		  $imageContent ='';
		  $imageDetails = get_field('allmed_image', $my_query->post->ID); 
		  if($imageDetails){
			 
			  $imageContent = '<img src="'.$imageDetails['url'].'" width="172" height="143" alt="'.qtrans_use($q_config['language'],$my_query->post->post_title, true).'" class="imgLeft" />';
		  }
		  
		  
		  $subDetails = get_pages("sort_order=ASC&sort_column=menu_order&child_of=$post->ID&post_type=allmed");
		 
		  $titleContent='';
		  if(is_array($subDetails)){
			  
			  $tabId=2;			  
			  
			  foreach( $subDetails as $sub){
				 
				  $imageBannerContent ='';
				  $imageBannerDetails = get_field('allmed_about_us_banner_image', $sub->ID); 
				 
				  if($imageBannerDetails){
					 
					  $imageBannerContent = '<span class="innerPage-Bnr"><img src="'.$imageBannerDetails['url'].'" width="647" height="158" /></span>';
				  }
				 
				  $imageInnnerContent ='';
				  $imageInnnerDetails = get_field('allmed_image', $sub->ID); 
				 
				  if($imageInnnerDetails){
					 
					  $imageInnnerContent = '<img src="'.$imageInnnerDetails['url'].'" width="172" height="143" class="imgLeft" />';
				  }
				  
			      $titleContent.= '<li><a href="#tab-'.$tabId.'">'.qtrans_use($q_config['language'],$sub->post_title, true).'</a></li>';
				  $descContent .=' <div id="tab-'.$tabId.'">'.$imageBannerContent.'
          <h3>'.qtrans_use($q_config['language'],$sub->post_title, true).'</h3>'.$imageInnnerContent.'
          '.qtrans_use($q_config['language'],$sub->post_content, true).'
        </div>';
				$tabId++;  
		      }
			  
		  }
		  $imageAbtBannerContent ='';
		  $imageAbtBannerDetails = get_field('allmed_about_us_banner_image', $post->ID); 
		  if($imageAbtBannerDetails){
			 
			  $imageAbtBannerContent = '<span class="innerPage-Bnr"><img src="'.$imageAbtBannerDetails['url'].'" width="647" height="158" /></span>';
		  }
		  
	?>
  <div class="main">
    <div id="tabsInner">
      <ul>
        <li><a href="#tab-1">
          <?php the_title(); ?>
          </a></li>
        <?php echo $titleContent;?>
      </ul>
      <div id="tab-1"> <?php echo $imageAbtBannerContent;?>
        <h3>About Us </h3>
        <p><?php echo $imageContent;?>
          <?php the_content(); ?>
        </p>
      </div>
      <?php echo $descContent;?> </div>
    <?php endwhile; // end of the loop. ?>
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
<?php get_footer('allmed'); ?>
