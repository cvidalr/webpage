<?php
get_header();
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
  <div style="position: absolute; z-index: 1; margin-top: 4px; margin-left: 15px; color: #FFFFFF">
    <b><?php echo __("<!--:en-->NEWS<!--:--><!--:es-->NOTICIAS<!--:-->"); ?></b>
  </div>
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
    <?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('Home'); } ?>
  </div>
  <div class="main mainHome">
    <?php $numLetters = array(1 => 'One',2 => 'Two',3 => 'Three',4 => 'Four',5 => 'Five',6 => 'Six',7 => 'Seven',8 => 'Eight',9 => 'Nine',10 => 'Ten'); ?>
    <?php
      
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
			
		  $catContent = '<div class="quickButtn"><ul>';
		  
		  while ($catQuery->have_posts()) : $catQuery->the_post();
		  	
			 $catContent.='<li class="quickB'.$numLetters[$countItem].'"><a href="'.get_permalink($catQuery->post->ID).'"><b>'.qtrans_use($q_config['language'],$catQuery->post->post_title,true).'</b></a></li>';
		 $countItem++;
		  ?>
    <?php
		  endwhile;
		   $catContent.= '</ul></div>';
		}
		wp_reset_query();  
		?>
    <?php echo $catContent;?>
    <?php 
		  $aboutUsId      = 159; 
		  $aboutUsPost    = get_page($aboutUsId); 
		  $aboutUsContent = qtrans_use($q_config['language'],$aboutUsPost->post_content,true); 
		  $aboutUsPostTitle = qtrans_use($q_config['language'],$aboutUsPost->post_title,true); 
		  $imageContent ='';
		  $imageDetails = get_field('image', $aboutUsId); 
		  if($imageDetails){
			 
			  $imageContent = '<img src="'.$imageDetails['url'].'" width="172" height="143" alt="'.qtrans_use($q_config['language'],$my_query->post->post_title, true).'" class="imgLeft" />';
		  }
		?>
    <?php		
		  $subDetails = get_pages("sort_order=ASC&sort_column=menu_order&child_of=$aboutUsId");
		  $titleContent='';
		  if(is_array($subDetails)){
			  
			  $tabId=2;			  
			  
			  foreach( $subDetails as $sub){
			      $titleContent.= '<li><a href="#tab-'.$tabId.'">'.qtrans_use($q_config['language'],$sub->post_title, true).'</a></li>';
				  $descContent .=' <div id="tab-'.$tabId.'">
          <h3>'.qtrans_use($q_config['language'],$sub->post_title, true).'</h3>
          '.qtrans_use($q_config['language'],$sub->post_content, true).'
        </div>';
				$tabId++;  
		      }
			  
		  }		 
	?>
    <div id="tabs">
      <ul>
        <li><a href="#tab-1"><?php echo $aboutUsPostTitle; ?></a></li>
        <?php echo $titleContent;?>
      </ul>
     <div id="tab-1">
        <h3><?php echo $aboutUsPostTitle; ?></h3>
        <p><?php echo $imageContent.$aboutUsContent; ?></p>
     </div>
      <?php echo $descContent;?> </div>
    <?php 
        $contactAddArgs=array(
		  'post_type' => 'contact-address',
		  'post_status' => 'publish',
		  'orderby' => 'menu_order',
		  'order' => 'ASC' 
		);
	    $contactAddContent='';
		$contactAddQuery = new WP_Query( $contactAddArgs);
		
		if( $contactAddQuery->have_posts() ) {
			
		  $contactAddContent = '<div class="contactHome">';
		  
		  while ($contactAddQuery->have_posts()) : $contactAddQuery->the_post();
		  		$contact_image ='';
				$contact_image_path ='';
				
			    $contact_image = get_field('contact_icon', $contactAddQuery->post->ID); 
				
				if($contact_image['url']!=''){
					$contact_image_path ='<div class="contactHomeL"><img src="'.$contact_image['url'].'" width="39" height="31" /></div>';
				}
				
			 	$contactAddContent.='<div class="contactHome-raw">
        <h2>'.qtrans_use($q_config['language'],$contactAddQuery->post->post_title, true).'</h2>
        '.$contact_image_path.'
        <div class="contactHomeR">'.qtrans_use($q_config['language'],nl2br($contactAddQuery->post->post_content), true).'</div>
      </div>'
			 
		  ?>
    <?php
		  endwhile;
		   $contactAddContent.= '</div>';
		}
		wp_reset_query();  
		?>    
      
   
    <?php echo $contactAddContent; ?> 
     <div class="contactHome2">
    	<div class="quickButtn2">
    		<a href="http://www.medishop.com.co" target="_blank">
    		<ul>
    			<li>
    				<div style="margin-top: 10px;">
    					<div style="width: 148px; float: right; margin-top: 10px; margin-right: 10px; font-size: 20px;">
    						<!--<font color="#9B9EA9">--><b>Tienda en Línea</b><!--</font>-->
    					</div>	    					
    				</div>
    			</li>
    		</ul>
    		</a>
    	</div>
    </div>
     
    <div class="contactHome">
    	<a href="http://107.20.185.153/allers/?page_id=1823">
		<div class="content-fichas">
			<b>Catálogos</b>
		</div>
		<div class="fichas"></div>
	</a>
    </div> 
    
    <div class="raw">
    <?php 
        $brandArgs=array(
		  'post_type' => 'our-brands',
		  'post_status' => 'publish',
		  'cat' => 23,
		  'posts_per_page' => -1,
		  'orderby' => 'menu_order',
		  'order' => 'ASC' 
		);
	  
		$brandQuery = new WP_Query( $brandArgs);
		
		if( $brandQuery->have_posts() ) {
			
		  $brandContent = '<h2 class="ourBrandsHead">'. __("<!--:en-->Brands<!--:--><!--:es-->Marcas<!--:-->").'</h2><ul id="OurBrandCarousel"  class="jcarousel-skin-tango">';
		  
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
     <?php echo $brandContent; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
