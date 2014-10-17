<?php
/**
 * The template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text"  name="s" id="s" placeholder="<?php echo __("<!--:en-->Search<!--:--><!--:es-->Buscar<!--:-->"); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value=""/>
	</form>
