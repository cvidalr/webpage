<?php
/**
 * Template Name: Second Level Template
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

$parent_id  = $post->post_parent;
$depth = 0;
while ($parent_id > 0) {
	$page = get_page($parent_id);
	$parent_id = $page->post_parent;
	$depth++;
}


$children = has_children($post->ID);

if($children!==false){
	$childPages = $children;
	$childExist = true;
}else{
	if($depth==1){
		$childPages="no child";
	}else{
		$children = has_children($post->post_parent);
		$childPages = $children;	
		$childExist = false;
	}
}

$slideShowName = get_field('slideshow_name', $post->ID);

/*$categories = get_the_category();

if(isset($categories[1]->cat_ID)){
	$catId = get_cat_ID($post->post_title);
}
else{
	$catId = $categories[0]->cat_ID;
}*/


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
  <?php
$titleContent='';

if(is_array($childPages)){
	
	$titleContent = "<ul>";
	
	foreach($childPages as $pages){
		//print_r($pages);
		$activeContent='';
		
		if($post->ID==$pages->ID){
			$activeContent='active';			
		}
		
		$titleContent.= '<li class="'.$activeContent.'"><a href="'.get_permalink($pages->ID).'">'. qtrans_use($q_config['language'],$pages->post_title, true).'</a></li>';
	}
	$titleContent.= "</ul>";
}else{
	$titleContent = "<ul>";
	$titleContent.= '<li class="active"><a href="'.get_permalink($post->ID).'">'. qtrans_use($q_config['language'],$post->post_title, true).'</a></li>';
	$titleContent.= "</ul>";
	
	}
//print_r($post);
?>
  <div class="main">
    <div id="tabsInner"> <?php echo $titleContent;?>
      <div>
        <?php if($childExist==false){?>
        <h1><?php echo qtrans_use($q_config['language'], $post->post_title, true);?></h1>
        <?php echo qtrans_use($q_config['language'], $post->post_content, true);?>
        <?php   }else{?>
        <h1><?php echo qtrans_use($q_config['language'], $childPages[0]->post_title, true);?></h1>
        <?php echo qtrans_use($q_config['language'], $childPages[0]->post_content, true);?>
        <?php   }?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>