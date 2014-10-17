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
        <h2><span>Links</span> </h2>
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
      <div class="footer-CellR">
        <h2><span>Follow Us</span> </h2>
        <ul class="footerUs">
          <li class="twitter"><a href="https://twitter.com/SalutiCali" title="Twitter" target="_blank"> Follow us on Twitter</a></li>
          <li class="facebook"><a href="https://www.facebook.com/SalutiCali" title="Facebook" target="_blank"> Find us on Facebook</a></li>
          <li class="youtube"><a href="#" title="Youtube"> Watch us on Youtube</a></li>
          <li class="linkedin"><a href="#" title="LinkedIn"> Join us on LinkedIn</a></li>
        </ul>
        <div class="brickwork"><a href="http://www.brickworkindia.com/" title="brickworkindia.com" target="_blank" class="brickwork"></a></div>
      </div>
    </div>
  </div><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>