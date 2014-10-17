<?php
/**
 * Template Name: Product Category Template
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

get_header('product-category'); 
$children = has_children($post->ID);
$slideShowName = get_field('slideshow_name', $post->ID);
?>
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

<div class="container SubBanner">
  <div class="slider">
    <?php   
	$page_title = $wp_query->post->post_title;
    //coment India
    /*  
    if($slideShowName!=''){
 		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow($slideShowName); }
    }else{
    	if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('Product Categories'); } 
    }
    */
    //Productos Farmacéuticos
	if(($page_title == 'Productos Farmacéuticos')||($page_title == 'Pharmaceuticals')){ 
		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('productos-farmaceuticos'); }
	}
    //Insumos Médicos
	if(($page_title == 'Insumos Médicos')||($page_title == 'Medical Supplies')){
		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('insumos-medicos'); } 
	}
    //Equipos Médicos
	if(($page_title == 'Equipos Médicos')||($page_title == 'Medical Equipment')){
		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('equipos-medicos'); } 
	}
    //Instrumental
	if(($page_title == 'Instrumental')||($page_title == 'Instruments')){
		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('instrumental'); } 
	}
    //Dotación y Muebles
	if(($page_title == 'Dotación y Muebles')||($page_title == 'Hospital Furniture')){
		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('dotacion-muebles'); } 
	}
    //Emergencias
	if(($page_title == 'Emergencias')||($page_title == 'Emergency')){
		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('emergencias'); } 
	}
    //Laboratorio
	if(($page_title == 'Laboratorio')||($page_title == 'Laboratory')){
		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('laboratorio'); } 
	}
    //Odontología
	if(($page_title == 'Odontología')||($page_title == 'Dentistry')){
		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('odontologia'); } 
	}
    //Ortopédicos
	if(($page_title == 'Ortopédicos')||($page_title == 'Orthopedic')){
		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('ortopedicos'); } 
	}
    //Salud y Bienestar
	if(($page_title == 'Salud y Bienestar')||($page_title == 'Health and Wellness')){
		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('salud-bienestar'); } 
	}
    ?>
    <div class="bannerSml"><?php echo qtrans_use($q_config['language'],$post->post_title, true);?></div>
  </div>
  <ul class="breadcrumbs">
    <?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb();
} ?>
  </ul>
  <?php
$titleContent='';
$descContent='';
if(is_array($children)){
	
	$titleContent = "<ul>";
	$tabId=1;
	foreach($children as $pages){
		//print_r($pages);
		$activeContent='';
				
		$titleContent.= '<li><a href="#tab-'.$tabId.'">'. qtrans_use($q_config['language'],$pages->post_title, true).'</a></li>';
		$descContent .=' <div id="tab-'.$tabId.'">
          <h1>'. qtrans_use($q_config['language'],$pages->post_title, true).'</h1>
          '. qtrans_use($q_config['language'],$pages->post_content, true).'
        </div>';
		$tabId++;  
	}
	$titleContent.= "</ul>";
}
//print_r($post);
?>
  <div class="main">
    <div id="tabsInner"> <?php echo $titleContent;?> <?php echo $descContent;?> </div>
    
   <?php $testimonialName        = get_field('testimonial_name', $post->ID);
         $testimonialCompanyName = get_field('testimonial_company_name', $post->ID);
		 $testimonialContent     = get_field('testimonial_content', $post->ID);
   
		 $imagetestimonialContent ='';
		 $imagetestimonialDetails = get_field('testimonial_image', $post->ID); 
	   
		 if($imagetestimonialDetails){
		   
			$imagetestimonialContent = '<img src="'.$imagetestimonialDetails['url'].'" width="172" height="143" /><div class="arrow"></div>';
		 }
   
   if($testimonialName!=''){	   
   ?>
    <ul class="testimonial">
      <li class="user"><?php echo $imagetestimonialContent;?>        
      </li>
      <li class=" content">
        <p>"<?php echo $testimonialContent;?> "</p>
        <b><?php echo $testimonialName;?>, <?php echo $testimonialCompanyName;?></b></li>
    </ul>
    <?php }?>
  </div>
</div>
<?php get_footer(); ?>
