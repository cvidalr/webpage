<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>
<style type="text/css">
.entry-title {display: none;}
</style>

<div class="container">
  <ul class="breadcrumbs">
    <?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb();
} ?>
  </ul>
  <div class="main">
    <h1>Login </h1>
    <div class="formLabel login">
      <div class="formMain">
        <div class="required"></div>
        <div class="form-cell">
          <h2>New Customer</h2>
          <div class="raw">
           <a href="<?php echo get_bloginfo('url');?>/register" class="registerLinkUrl">Create an Account</a>
          </div>
        </div>
        <div class="form-cell">
          <h2>Already Customer?</h2>
          <?php $template->the_action_template_message( 'login' ); ?>
          <?php $template->the_errors(); ?>
          <form name="login_form" id="login_form<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'login' ); ?>" method="post">
            <label for="user_login<?php $template->the_instance(); ?>">
              <?php _e( 'Username' ); ?>
            </label>
            <input type="text" name="log" id="user_login<?php $template->the_instance(); ?>" class="requiredField" value="<?php $template->the_posted_value( 'log' ); ?>" size="20" />
            <label for="user_pass<?php $template->the_instance(); ?>">
              <?php _e( 'Password' ); ?>
            </label>
            <input type="password" name="pwd" id="user_pass<?php $template->the_instance(); ?>" class="requiredField" value="" size="20" />
            <?php do_action( 'login_form' ); ?>
            <div class="raw">
              <input type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Log In' ); ?>" />
              <input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'login' ); ?>" />
              <input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
              <input type="hidden" name="action" value="login" />
            </div>
          </form>
         
        </div>
      </div>
    </div>
  </div>
</div>