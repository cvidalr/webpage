<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>
<style type="text/css">
.entry-title {
	display: none;
}
</style>
<div class="container">
  <ul class="breadcrumbs">
    <?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb();
} ?>
  </ul>
  <form name="registerform" id="registerform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'register' ); ?>" method="post">
    <div class="main">
      <h1>Create <span>Your Account</span> </h1>
      <div class="formLabel register">
        <div class="formMain">
          <?php $template->the_action_template_message( 'register' ); ?>
          <?php $template->the_errors(); ?>
          <h2>New Customer</h2>
          <div class="form-cell">
            <label for="user_email<?php $template->the_instance(); ?>">
              <?php _e( 'E-mail' ); ?>
            </label>
            <input type="text" name="user_email" id="user_email<?php $template->the_instance(); ?>" class="requiredField" value="<?php $template->the_posted_value( 'user_email' ); ?>" size="20" />
            <label for="pass1<?php $template->the_instance(); ?>">
              <?php _e( 'Password' ); ?>
            </label>
            <input type="password" name="pass1" id="user_email<?php $template->the_instance(); ?>" class="requiredField" value="" />
            <label for="pass2<?php $template->the_instance(); ?>">
              <?php _e( 'Confirm Password' ); ?>
            </label>
            <input type="password" name="pass2" id="pass2<?php $template->the_instance(); ?>" class="requiredField"  />
          </div>
        </div>
      </div>
      <div class="formLabel register">
        <div class="formMain">
          <h2>Your Contact Information</h2>
          <div class="form-cell">
            <label for="FIRSTNAME<?php $template->the_instance(); ?>">
              <?php _e( 'First name') ?>
            </label>
            <input type="text" name="cimy_uef_wp_FIRSTNAME" id="cimy_uef_wp_1" class="requiredField" value="<?php $template->the_posted_value( 'cimy_uef_wp_FIRSTNAME' ); ?>" size="20" tabindex="20" />
            <label for="last_name<?php $template->the_instance(); ?>">
              <?php _e( 'Last name') ?>
            </label>
            <input type="text" name="cimy_uef_wp_LASTNAME" id="cimy_uef_wp_2" class="requiredField" value="<?php $template->the_posted_value( 'cimy_uef_wp_LASTNAME' ); ?>" size="20" tabindex="20" />
            <label for="company<?php $template->the_instance(); ?>">
              <?php _e( 'Company') ?>
            </label>
            <input type="text" name="cimy_uef_COMPANY" id="cimy_uef_1"  value="<?php $template->the_posted_value( 'cimy_uef_COMPANY' ); ?>" />
            <label for="Address<?php $template->the_instance(); ?>">
              <?php _e( 'Address 1') ?>
            </label>
            <input type="text" name="cimy_uef_ADDRESS" id="cimy_uef_2"  value="<?php $template->the_posted_value( 'cimy_uef_ADDRESS' ); ?>" />
            <label for="Address2<?php $template->the_instance(); ?>">
              <?php _e( 'Address 2') ?>
            </label>
            <input type="text" name="cimy_uef_ADDRESS2" id="cimy_uef_3"  value="<?php $template->the_posted_value( 'cimy_uef_ADDRESS2' ); ?>" />
          </div>
          <div class="form-cell">
            <label for="Postal_code<?php $template->the_instance(); ?>">
              <?php _e( 'Postal Code') ?>
            </label>
            <input type="text" name="cimy_uef_POSTALCODE" id="cimy_uef_4"  value="<?php $template->the_posted_value( 'cimy_uef_POSTALCODE' ); ?>" />
            
            <label for="city<?php $template->the_instance(); ?>">
              <?php _e( 'City') ?>
            </label>
            <input type="text" name="cimy_uef_CITY" id="cimy_uef_5"  value="<?php $template->the_posted_value( 'cimy_uef_CITY' ); ?>" />
            
            <label for="Country<?php $template->the_instance(); ?>">
              <?php _e( 'Country') ?>
            </label>
            <input type="text" name="cimy_uef_COUNTRY" id="cimy_uef_6"  value="<?php $template->the_posted_value( 'cimy_uef_COUNTRY' ); ?>" />
            
            <div class="raw">
              <input type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Register' ); ?>" />
              <input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'register' ); ?>" />
              <input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
              <input type="hidden" name="action" value="register" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>