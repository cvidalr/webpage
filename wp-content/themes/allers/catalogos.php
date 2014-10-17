<?php
/*
Template Name: Catálogos
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
?>
    
<?php
get_header();
$slideShowName = get_field('slideshow_name', $post->ID);
$categories = get_the_category();  $cat_name = $categories[0]->slug;
?>
<style>
#left{
	float: left;
	width: 33%;
	padding-top: 10px;
	padding-bottom: 10px;
}   
#right{
	float: left;
	width: 33%;
	padding-top: 10px;
	padding-bottom: 10px;
}

#mid{
	width: 33%;
	float:left;
	padding-top: 10px;
	padding-bottom: 10px;
}
  
</style>


<div class="container SubBanner">
  <ul class="breadcrumbs">
    <?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb();
    } ?>
  </ul>
  <div class="main">
    <?php while ( have_posts() ) : the_post(); ?>
    <h1>
      <?php the_title(); ?>
    </h1>
    <?php endwhile; // end of the loop. ?>
    
	    <?php
		  $nombre_archivo = '/allers/wp-content/uploads/catalogos/Catálogo%20Seca%202014.pdf';
		  $nombre_archivo2 = '/allers/wp-content/uploads/catalogos/mBCA%20514.pdf';
		  $nombre_archivo3 = '/allers/wp-content/uploads/catalogos/Spencer%202013.pdf';
		  $nombre_archivo4 = '/allers/wp-content/uploads/catalogos/Catalogo%20Allmed%202014.pdf';
		  $nombre_archivo5 = '/allers/wp-content/uploads/catalogos/Catalogo%20Lemke%202014.pdf';
		  
		  function getRemoteFileSize($url) {
		        $info = get_headers($url,1);
		        if (is_array($info['Content-Length'])) {
		            $info = end($info['Content-Length']);
		        }
		        else {
		            $info = $info['Content-Length'];
		        }
		        return $info;
		    }
			
		    function tamano_archivo($peso , $decimales = 2 ) {
		    	$clase = array(" Bytes", " KB", " MB", " GB", " TB"); 
		    	return round($peso/pow(1024,($i = floor(log($peso, 1024)))),$decimales ).$clase[$i];
		    }
	    ?>
		
<div id="container">
  <div id="row">
    <div id="left">
      	<div style="float: left"><img src="http://107.20.185.153/allers/wp-content/uploads/2014/01/icono-pdf.png"></div>
      	<div style="float: left">
      	<b>Catálogo Allmed 2014</b><br>
      	<a href="<?php echo $nombre_archivo4 ?>" target="_new">Ver</a> |
		<a href="<?php echo $nombre_archivo4 ?>" download="Catálogo Allmed 2014.pdf">Descargar</a><br>
		<?php $peso_archivo = getRemoteFileSize("http://107.20.185.153".$nombre_archivo4);
		echo tamano_archivo($peso_archivo);?>
		</div>
    </div>
  </div>	

  <div id="row">
    <div id="mid">
    	<div style="float: left"><img src="http://107.20.185.153/allers/wp-content/uploads/2014/01/icono-pdf.png"></div>
    	<div style="float: left">
    	<b>Catálogo Seca 2014</b><br>
    	<a href="<?php echo $nombre_archivo ?>" target="_new">Ver</a> |
		<a href="<?php echo $nombre_archivo ?>" download="Catálogo Seca 2014.pdf">Descargar</a><br>
		<?php $peso_archivo = getRemoteFileSize("http://107.20.185.153".$nombre_archivo);
		echo tamano_archivo($peso_archivo);?>
		</div>
    </div>
  </div>
  
  <div id="row">
    <div id="right">
      	<div style="float: left"><img src="http://107.20.185.153/allers/wp-content/uploads/2014/01/icono-pdf.png"></div>
      	<div style="float: left">
      	<b>mBCA 514</b><br>
      	<a href="<?php echo $nombre_archivo2 ?>" target="_new">Ver</a> |
		<a href="<?php echo $nombre_archivo2 ?>" download="mBCA 514.pdf">Descargar</a><br>
		<?php $peso_archivo = getRemoteFileSize("http://107.20.185.153".$nombre_archivo2);
		echo tamano_archivo($peso_archivo);?>
		</div>
    </div>
  </div>
  
  <div id="row">
    <div id="left">
      	<div style="float: left"><img src="http://107.20.185.153/allers/wp-content/uploads/2014/01/icono-pdf.png"></div>
      	<div style="float: left">
      	<b>Spencer</b><br>
      	<a href="<?php echo $nombre_archivo3 ?>" target="_new">Ver</a> |
		<a href="<?php echo $nombre_archivo3 ?>" download="Catálogo Spencer.pdf">Descargar</a><br>
		<?php $peso_archivo = getRemoteFileSize("http://107.20.185.153".$nombre_archivo3);
		echo tamano_archivo($peso_archivo);?>
		</div>
    </div>
  </div>
  
  <div id="row">
    <div id="mid">
      	<div style="float: left"><img src="http://107.20.185.153/allers/wp-content/uploads/2014/01/icono-pdf.png"></div>
      	<div style="float: left">
      	<b>Catálogo Lemke 2014</b><br>
      	<a href="<?php echo $nombre_archivo5 ?>" target="_new">Ver</a> |
		<a href="<?php echo $nombre_archivo5 ?>" download="Catálogo Lemke 2014.pdf">Descargar</a><br>
		<?php $peso_archivo = getRemoteFileSize("http://107.20.185.153".$nombre_archivo5);
		echo tamano_archivo($peso_archivo);?>
		</div>
    </div>
  </div>
</div>
		
  </div>
</div>
<?php get_footer(); ?>
