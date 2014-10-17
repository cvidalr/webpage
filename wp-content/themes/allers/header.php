<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
<?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon.ico" type="image/x-icon" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/login-style.css" />

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-50010206-1', 'allers.com.co');
  ga('require', 'linkid', 'linkid.js');
  ga('require', 'displayfeatures');  
  ga('send', 'pageview');
</script>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js?ver=1.4.2"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/login.js"></script>
<!--mega Popup menu-->
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/jquery.dcmegamenu.1.2.js'></script>
<script type="text/javascript">
$(document).ready(function($){
	$('#mega-menu-4').dcMegaMenu({
		rowItems: '3',
		speed: 'fast',
		effect: 'fade'
	});
	$('a[title=proveedores]').attr('target','_blank');
	$('a[title=pse]').attr('target','_blank');
});
</script>
<link href="<?php echo get_template_directory_uri(); ?>/css/megamenu.css" rel="stylesheet" type="text/css" />
<!--Slider banner-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/tms-0.3.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/tms_presets.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
<!--Language menu-->
<link href="<?php echo get_template_directory_uri(); ?>/css/languageswitcher.css" rel="stylesheet" type="text/css">
<script src="<?php echo get_template_directory_uri(); ?>/js/languageswitcher.js"></script>
<!--  scroll bar Slider library -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<script type="text/javascript">
function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

$(document).ready(function() {
    $('#mycarousel').jcarousel({
        auto: 6,
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });
});
</script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/slider.css">
<!--Product Tab- home page-->
<script type="text/javascript">
$(document).ready(function(){
$('#tabs div').hide();
$('#tabs div:first').show();
$('#tabs ul li:first').addClass('active');
$('#tabs ul li a').click(function(){ 
$('#tabs ul li').removeClass('active');
$(this).parent().addClass('active'); 
var currentTab = $(this).attr('href'); 
$('#tabs div').hide();
$(currentTab).show();
return false;
});
});
</script>
</head>
<body>
<div class="wrapper">
<div class="headerMain">
  <div class="header">
    <div class="headerLeft">
      <div class="logo"><a href="<?php echo qtrans_convertURL(esc_url( home_url( '/' ) )); ?>" title="allers"></a></div>
    </div>
    <div class="headerRight">
      <div class="headerLinkT">
      
      <?php
if ( is_user_logged_in() ) {
    //iecho '<div id="loginContainer"><ul class="userProfileLinks"><li><a href="'. get_bloginfo('url').'/your-profile">Edit Profile</a></li><li ><a href="'. wp_logout_url() .'">Logout</a></li></ul> </div>';
    echo '<div id="loginContainer">
      <ul class="userProfileLinks">
        <li><a href="'. get_bloginfo('url').'/your-profile">'. __("<!--:en-->Edit Profile<!--:--><!--:es-->Editar Perfil<!--:-->").'</a></li>
        <li ><a href="'. wp_logout_url() .'">'. __("<!--:en-->Logout<!--:--><!--:es-->Cerrar Sesión<!--:-->").'</a></li>
      </ul> 
    </div>';
}
else{
	
	if($posts[0]->post_name !='register'){
?>
        <div id="loginContainer"> <a href="#" id="loginButton"><span><?php echo __("<!--:en-->Login<!--:--><!--:es--><div style='font-size:12px;width:36px;line-height:11px;'>Iniciar Sesión</div><!--:-->"); ?></span><em></em></a>
          <div style="clear:both"></div>
          <div id="loginBox">
           <?php dynamic_sidebar( 'sidebar-6' );?>
          </div>
        </div>
        <?php }}?>
      </div>
      <div id="country-select">
        <form action="">
         <?php dynamic_sidebar( 'sidebar-7' );?>
        </form>
      </div>
      <ul class="topLink" style="margin-left:-65px;">
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
      </ul>
       <?php dynamic_sidebar( 'allers-headerbutton' );?>
      <div class="search">
        <?php get_search_form(); ?>
      </div>
    </div>
    <div class="blue"> 
      <?php wp_nav_menu( array('container'=>'false',
								 'container_id' => 'mega-menu-4',
								 'menu' => 'Secondary Menu',
								 'items_wrap'     => '<ul id="mega-menu-4" class="mega-menu">%3$s</ul>',
								 'walker'        => new themeslug_walker_nav_menu
						) 
			);
				
		?>
    </div>
  </div>
</div>
