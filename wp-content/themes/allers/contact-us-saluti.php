<?php
/**
 * Template Name: Saluti Contact Template
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
  <div class="slider">
    <?php  
 if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('product-categories'); } ?>
  </div>
  <ul class="breadcrumbs">
    <?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb();
} ?>
  </ul>
  <?php $subDetails = get_post_meta( $post->ID, 'sublevelpages', true ); 
		  $titleContent='';
		  if($subDetails){
			  
			  $tabId=1;
			  
			  $titleContent = "<ul>";
			  
			  foreach( $subDetails as $sub){
			      $titleContent.= '<li><a href="#tab-'.$tabId.'">'.$sub['title'].'</a></li>';
				  $descContent .=' <div id="tab-'.$tabId.'">
          <h1>'.$sub['title'].'</h1>
          '.$sub['description'].'
        </div>';
				$tabId++;  
		      }
			  $titleContent.= "</ul>";
		  }
		 
	?>
  <div class="main">
    <div class="cell-left">
      <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'content', 'page' ); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
    <div class="cell-Right">
      <div class="widget">
        <h2>Product Categories<span class="widgetIcon"></span></h2>
             
	  <?php
      
        $catArgs=array(
		  'post_type' => 'saluti',
		  'post_status' => 'publish',
		  'cat' => 20,
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
		wp_reset_query();  
		?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
