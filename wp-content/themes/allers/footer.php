<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	

	<div class="footerMain">
    <div class="footer">
      <div class="footer-CellL">
        <h2><span><?php echo __("<!--:en-->Links<!--:--><!--:es-->Enlaces<!--:-->"); ?></span> </h2>
        <ul class="footerLink">
      <?php wp_nav_menu( array('container'=>'false',
								 'container_id' => 'mega-menu-4',
								 'menu' => 'Footer Menu',
								 'items_wrap'     => '<ul id="mega-menu-4">%3$s</ul>',
								 'walker'        => new themeslug_walker_nav_menu
						) 
			);
				
		?>
        </ul>
        &copy; 2011 allers </div>
      <?php dynamic_sidebar( 'sidebar-3' );?>
    </div>
  </div><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
