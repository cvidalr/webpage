<?php
/**
 * Template Name: Healthcare Providers Template
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
$children = has_children($post->ID);
$slideShowName = get_field('slideshow_name', $post->ID);
?>

<div class="container">
  <div class="slider">
    <?php if($slideShowName!=''){
 		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow($slideShowName); }
    }else{
    	if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('healthcare-providers'); } 
    }?>
  </div>
  <ul class="breadcrumbs">
    <?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb();
} ?>
  </ul>
  <?php
$imageFieldOne = get_field('image', $children[0]->ID);

$imageUrlOne =  '<img src="'.$imageFieldOne[url].'" width="232" height="138" class="imgLeft" />';

$imageFieldTwo = get_field('image', $children[1]->ID);

$imageUrlTwo =  '<img src="'.$imageFieldTwo[url].'" width="387" height="106" class="imgLeft" />';

?>
  <div class="main">
    <h1> <?php echo qtrans_use($q_config['language'],$post->post_title, true);?></h1>
    <h3><?php echo qtrans_use($q_config['language'],$children[0]->post_title, true);?></h3>
    <?php echo $imageUrlOne;?> <?php echo qtrans_use($q_config['language'],$children[0]->post_content, true);?>
    <ul class="portfolio">
      <li>
        <h2> <?php echo qtrans_use($q_config['language'],$children[1]->post_title, true);?> </h2>
        <p><?php echo $imageUrlTwo;?></p>
        <?php echo qtrans_use($q_config['language'],$children[1]->post_content, true);?> </li>
      <li>
        <h2> Newsletter </h2>
        <div class="newsletter">
          <form method="get" action="#">
            <input id="name" type="text" value="Enter Your Email" name="name" onfocus="form.name.value = ''"/>
            <input type="submit" value="Suscribe" />
          </form>
        </div>
      </li>
    </ul>
  </div>
</div>
<?php get_footer(); ?>